<?php
namespace Modules\User\Repository\Interfaces;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getTransactionsByUserId($userId): Collection;
}
