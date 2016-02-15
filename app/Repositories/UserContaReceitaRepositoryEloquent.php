<?php

namespace finLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finLaravel\Repositories\UserContaReceitaRepository;
use finLaravel\Entities\UserContaReceita;

/**
 * Class ProjetoRepositoryEloquent
 * @package namespace finLaravel\Repositories;
 */
class UserContaReceitaRepositoryEloquent extends BaseRepository implements UserContaReceitaRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return UserContaReceita::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    
}
