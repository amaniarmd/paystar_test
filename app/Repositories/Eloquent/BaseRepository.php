<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $attributes
     *
     * @return Model
     */
    public function create($attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $attribute
     * @param $value
     * @return Model|null
     */
    public function findByAttribute($attribute, $value, $scope = null): ?Collection
    {
        if ($scope != null) {
            return $this->model->where($attribute, $value)->first()->$scope()->get();
        } else {
            return $this->model->where($attribute, $value)->get();
        }
    }
}
