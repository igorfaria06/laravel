<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace finLaravel\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use finLaravel\Transformers\ProjetoTransformer;

/**
 * Description of ProjetoPresenter
 *
 * @author proativos
 */
class ProjetoPresenter extends FractalPresenter {

    public function getTransformer() {
        return new ProjetoTransformer();
    }

}
