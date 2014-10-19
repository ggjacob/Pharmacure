<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Documents extends Controller {

    /**
     * @UserS('REQUIRED')
     */
    function index() {
        $d['view'] = array("titre" => "Gestion des documents");
        $this->set($d);
        $this->render('index');
    }

}

?>