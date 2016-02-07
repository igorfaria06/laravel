<?php

namespace cursoLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cursoLaravel\Repositories\ProjetoRepository;
use cursoLaravel\Entities\Projeto;
use cursoLaravel\Presenters\ProjetoPresenter;

/**
 * Class ProjetoRepositoryEloquent
 * @package namespace cursoLaravel\Repositories;
 */
class ProjetoRepositoryEloquent extends BaseRepository implements ProjetoRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Projeto::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function isOwner($id, $userId) {

        if (count($this->findWhere(['id' => $id, 'owner_id' => $userId]))):
            return true;
        else:
            return false;
        endif;
    }

    public function hasMember($projetoId, $userId) {

        $projeto = Projeto::find($projetoId);
        foreach ($projeto->membros as $membro):
            if ($membro->id = $userId):
                return true;
            endif;
        endforeach;
        return false;
    }

    public function presenter(){
        return ProjetoPresenter::class;
    }
    
}
