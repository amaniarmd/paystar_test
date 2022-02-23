<?php

namespace Modules\Transaction\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface TransactionRepositoryInterface
{
    /**
     * @param Request $request
     * @return Model
     */
    public function createTransaction(Request $request): Model;
}

