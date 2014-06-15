<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Popup
 *
 * @author tidiany
 */
class Popup extends Controller {
    
    
    function editItem($id, $type){
        $object = new $type();
        
        $object = Doctrine_Core::getTable(strtolower($type))->find($id);
        $object = $object->toArray();
        $d['view'] = array("titre" => "Edition", "object"=>$object, "type" => $type);
        $this->set($d);
        $this->render('edit');
    }
    
    
}
