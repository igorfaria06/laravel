<?php

namespace finLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finLaravel\Repositories\BancoRepository;
use finLaravel\Entities\Banco;

/**
 * Class ProjetoRepositoryEloquent
 * @package namespace finLaravel\Repositories;
 */
class BancoRepositoryEloquent extends BaseRepository implements BancoRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Banco::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    
}
