<?php

namespace cursoLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cursoLaravel\Repositories\ProjetoNotasRepository;
use cursoLaravel\Entities\ProjetoNotas;

/**
 * Class ProjetoNotasRepositoryEloquent
 * @package namespace cursoLaravel\Repositories;
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
