<?php

namespace finLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finLaravel\Repositories\ProjetoNotasRepository;
use finLaravel\Entities\ProjetoNotas;

/**
 * Class ProjetoNotasRepositoryEloquent
 * @package namespace finLaravel\Repositories;
 */
class ProjetoNotasRepositoryEloquent extends BaseRepository implements ProjetoNotasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjetoNotas::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
