<?php
class Controller{

    var $vars = array();
    var $erreur = array();
    var $layout = 'Iframe';

    function __construct(){
        if(isset($_POST)){
            $this->data = $_POST;
        }
		//$this->layout=false;
    }

    function set($d){
        $this->vars = array_merge($this->vars,$d);
    }

    function setErreur($name,$value){
        $this->erreur["$name"] = $value;
    }

    function alert($msg,$duration){
            require(ROOT.'views/layout/alert.php');
    }

    function redirect($url,$time){
        echo '<meta http-equiv=\'refresh\' content=\''.$time.';url='.WEBROOT.$url.'\'/>';
    }

    function infoPharmacie($show){
        try {
              $json = file_get_contents(ROOT."conf/pharmacie.json");
              $infos = json_decode($json);
              return $infos->{$show};    
        } catch (Exception $e) {
              $retour="Erreur";
              return $retour;
        }
    }

    function render($filename){
        extract($this->vars);
        ob_start(); 
        require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
        $content_for_layout = ob_get_clean();
        if($this->layout==false){
            echo $content_for_layout;
        }else{
            require(ROOT.'views/layout/'.$this->layout.'.php');
        }
    }

    function getPharmacieInfos($info){
        $json = file_get_contents(ROOT."conf/pharmacie.json");
        $infos = json_decode($json);
        return $infos->{$info};
    }

}
?>