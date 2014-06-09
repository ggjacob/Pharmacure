
<?php
 
class Statistiques extends Controller{


    /**
     * @UserS('REQUIRED')
     */
    function index(){
        $d['view'] = array("titre" => "Gestion des tableaux de bords statistique");
        $this->set($d); 
        $this->render('index');
    }
}
?>