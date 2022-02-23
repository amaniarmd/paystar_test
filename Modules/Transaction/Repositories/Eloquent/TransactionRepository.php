<?php

namespace Modules\Transaction\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\Pure;
use Modules\Transaction\Entities\Transaction;
use Modules\Transaction\Repositories\Interfaces\TransactionRepositoryInterface;
use Psr\Http\Message\ResponseInterface;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * TransactionRepository constructor.
     *
     * @param Transaction $model
     */
    #[Pure] public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }

    /**
     * @param Request $request
     *
     * @return Model
     * @throws HttpResponseException
     */
    public function createTransaction(Request $request): Model
    {
        DB::beginTransaction();
        try {
            $response = $this->sendToFinnotech($request->all());

            if ($response->getStatusCode() == config('transaction.finnotech.successful_status_code')) {
                $transaction = $this->saveTransaction($response, $request->all());
                DB::commit();

                return $transaction;
            }

        } catch (\Exception $exception) {
            DB::rollBack();

            throw new HttpResponseException(response()->json($exception->getMessage(), $exception->getCode()));
        }

    }

    /**
     * @param $request
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendToFinnotech($request)
    {
        $client = new Client();

        return $client->post(
            config('transaction.finnotech.address') .
            '/oak/v2/clients/' .
            config('transaction.finnotech.client_id') .
            '/transferTo?trackId=' .
            config('transaction.finnotech.track_id'), $request);
    }

    /**
     * @param ResponseInterface $response
     * @return Model
     */

    private function saveTransaction(ResponseInterface $response, $request)
    {
        $finnotechResponse = $response->getBody();
        $request[] = $finnotechResponse['result'];
        $request['user_id'] = auth()->id();

        return $this->create($request);
    }
}
