<?php
require_once('./BD.php');

$obj = new BD();

if(isset($_POST['btn'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contrasenia'];
    $pagina = 'index.php';

    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = "6LcJJmUpAAAAAAZwfoI3XH8qP2JvYh16l9Uk5J_A";
    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
    $atributos = json_decode($respuesta, TRUE);

    if(!$atributos['success']){
        echo "<script> alert('Verificar Capthca') </script>";
        $obj->ir_Pagina($pagina);
    }else{
        if(empty($nombre) || empty($email) || empty($contraseña)){
            echo "<script> alert('Debe llenar todos los campos') </script>";
            $obj->ir_Pagina($pagina);
        }else{
            $obj->New_User($nombre, $email, $contraseña);
            echo "<script> alert('Registro Exitoso') </script>";
            $obj->ir_Pagina($pagina);
        }
    }

}


?>