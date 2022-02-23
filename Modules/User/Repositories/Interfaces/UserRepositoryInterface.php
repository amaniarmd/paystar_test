<?php
namespace Modules\User\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getTransactionsByUserId($userId): Collection;
}
