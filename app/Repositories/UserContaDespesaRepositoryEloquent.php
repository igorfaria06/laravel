<?php

namespace finLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finLaravel\Repositories\UserContaDespesaRepository;
use finLaravel\Entities\UserContaDespesa;

/**
 * Class ProjetoRepositoryEloquent
 * @package namespace finLaravel\Repositories;
 */
class UserContaDespesaRepositoryEloquent extends BaseRepository implements UserContaDespesaRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return UserContaDespesa::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    
}
