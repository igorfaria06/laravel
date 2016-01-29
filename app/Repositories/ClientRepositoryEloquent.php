<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace cursoLaravel\Repositories;

use cursoLaravel\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;
use cursoLaravel\Repositories\ClientRepository;

/**
 * Description of ClientRepositoryEloquent
 *
 * @author proativos
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository {
    
    public function model(){
        
        return Client::class;        
    }
    
}
