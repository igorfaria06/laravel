<?php

namespace finLaravel\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use finLaravel\Repositories\UserBancoContaRepository;
use finLaravel\Entities\UserBancoConta;

/**
 * Class ProjetoRepositoryEloquent
 * @package namespace finLaravel\Repositories;
 */
class UserBancoContaRepositoryEloquent extends BaseRepository implements UserBancoContaRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return UserBancoConta::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    
}
