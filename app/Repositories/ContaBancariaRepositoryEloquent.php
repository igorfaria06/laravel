<?php

namespace finLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finLaravel\Repositories\ContaBancariaRepository;
use finLaravel\Entities\ContaBancaria;

/**
 * Class ProjetoRepositoryEloquent
 * @package namespace finLaravel\Repositories;
 */
class ContaBancariaRepositoryEloquent extends BaseRepository implements ContaBancariaRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return ContaBancaria::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    
}
