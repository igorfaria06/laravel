<?php

namespace finLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finLaravel\Repositories\UserRepository;
use finLaravel\Entities\User;
use finLaravel\Presenters\UserPresenter;

/**
 * Class ProjetoRepositoryEloquent
 * @package namespace finLaravel\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    
}
