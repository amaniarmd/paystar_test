<?php

namespace Modules\Transaction\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Transaction\Http\Requests\TransactionCreateRequest;
use Modules\Transaction\Repositories\Interfaces\TransactionRepositoryInterface;
use Modules\Transaction\Transformers\TransactionResource;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class TransactionController extends Controller
{
    private $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        /** @var UserRepositoryInterface $userRepo */
        $userRepo = app(UserRepositoryInterface::class);
        $transactions = $userRepo->getTransactionsByUserId(auth()->id());

        return TransactionResource::collection($transactions);
    }

    /**
     * Store a newly created resource in storage.
     * @param TransactionCreateRequest $request
     * @return TransactionResource
     */
    public function store(TransactionCreateRequest $request)
    {
        $transaction = $this->transactionRepository->createTransaction($request);

        return new TransactionResource($transaction);
    }
}
