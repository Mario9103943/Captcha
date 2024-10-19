<?php

 class BD{
    private $tipo_BD;
    private $servidor;
    private $usuario;
    private $contraseña;
    private $DB;

    public function __construct(){
        $this->tipo_BD = "mysql";
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->contraseña = "";
        $this->DB = "captcha";
    }

    public function Connection($tipo, $host, $user, $pws, $db){
        try{
            $cnx = new PDO("$tipo:host=$host; dbname=$db;charset=utf8", $user, $pws);
            $cnx->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_SILENT);
            return $cnx;
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
            exit;
        }
    }

    public function ir_Pagina($pagina){
        echo "
        <script type='text/javascript'>
            location.href = '$pagina';
        </script>
        ";
    }

    public function New_User($nombre, $email, $contraseña){
        $cnx = $this->Connection($this->tipo_BD, $this->servidor, $this->usuario, $this->contraseña, $this->DB);

        $contraseña_nivel_1 = md5($contraseña);
        $contraseña_nivel_2 = crc32($contraseña_nivel_1);
        $contraseña_nivel_3 = crypt($contraseña_nivel_2, 'xtemp');
        $contraseña_nivel_4 = sha1($contraseña_nivel_3);

        $query = $cnx->prepare("INSERT INTO usuarios(nombre, email, contraseña) VALUES(:n, :e, :c)");
        $query->bindParam(":n", $nombre);
        $query->bindParam(":e", $email);
        $query->bindParam(":c", $contraseña_nivel_4);
        
        return $query->execute();
    }

 }

?>