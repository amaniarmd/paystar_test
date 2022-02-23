<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface EloquentRepositoryInterface
{
    /**
     * @param  $attributes
     * @return Model
     */
    public function create($attributes): Model;

    public function findByAttribute($attribute, $value, $scope = null): ?Collection;
}

