<?php

require_once("./BD.php");

class captcha{

    public function __contruct(){
        $obj = new BD();
    }

    public function validacion($ip, $captcha, $secretkey){
        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
        $atributos = json_decode($respuesta, TRUE);

        if(!$atributos['success']){
            
        }
    }
}

?>