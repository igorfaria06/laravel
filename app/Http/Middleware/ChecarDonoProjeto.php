<?php

namespace cursoLaravel\Http\Middleware;

use Closure;
use cursoLaravel\Repositories\ProjetoRepository;

class ChecarDonoProjeto {

    private $repository;

    function __construct(ProjetoRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $userId = \Authorizer::getResourceOwnerId();
        $projeto = $request->projeto;
        if ($this->repository->isOwner($projeto, $userId) == false){
            return ['error' => 'Access Forbbiden'];
        }
            return $next($request);
    }

}
