<?php
 
class Commandes extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $form['type'] ='create';
        $clients = new Client();
        $clients = Doctrine_Core::getTable('client')->findAll();
        $d['view'] = array("titre" => "Gestion des clients","clients"=>$clients,"form" => $form);
        $this->set($d);
        $this->render('index');
    }

    function data(){
        $commandes = new Commande();
        $commandes = Doctrine_Core::getTable('commande')->findAll();
        $commandes = $commandes->toArray(true);
        var_dump($commandes);
           //$data = array('data' =>$commandes);
//        var_dump($data);
        //$text = json_encode($data);
        //echo $text;
//        $this->render('test');
        
    }
}
?>