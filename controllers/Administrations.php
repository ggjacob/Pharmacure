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
        $infos = json_decode($json);
        $d['view'] = array("titre" => "Mettre à jour les infos globales de la pharmacie","infos"=>$infos);
        $this->set($d); 
        $this->render('infos');
    }

    function infosModification(){    
        $infos = array('nom' => $this->data['nom'],
                        'adresse' => $this->data['adresse'],
                        'tel' => $this->data['tel'],
                        'mail' => $this->data['mail'],
                        'registre' => $this->data['registre'],
                        'mobilier' => $this->data['mobilier'],
                        'fiscale' => $this->data['fiscale']);
        $json = json_encode($infos);
        try {
                $file = fopen(ROOT."conf/pharmacie.json", 'w+');
                ftruncate($file,0);
                fputs ($file, $json);
                fclose($file);
                echo 'success';        
            } catch (Exception $e) {
                echo 'failed';
            }
    }
}
?>