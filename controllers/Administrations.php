<?php
/**
 * @Admin('REQUIRED')
 */ 
class Administrations extends Controller{


    function index(){
        $d['view'] = array("titre" => "Mettre à jour les infos globales de la pharmacie");
        $this->set($d); 
        $this->render('index');
    }

    
    function infos(){    
            
        $json = file_get_contents(ROOT."conf/pharmacie.json");


        $d['view'] = array("titre" => "Mettre à jour les infos globales de la pharmacie");
        $this->set($d); 
        $this->render('infos');
    }
}
?>