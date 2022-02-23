<?php

namespace Modules\User\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Collection;
use Modules\User\Entities\User;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getTransactionsByUserId($userId): Collection
    {
        return $this->findByAttribute('id', $userId, 'transactions');
    }
}
