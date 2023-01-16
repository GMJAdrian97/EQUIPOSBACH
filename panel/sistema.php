<?php
    class Sistema{
        public $con;

        public function conexion(){
            $dbDriver = "mysql";
            $dbHost = "localhost";
            $dbUser = "equipos_pc";
            $dbPass = "3Qu1P052022";
            $db = "equipos_pc";
            /*$this->con = new mysqli($dbHost,$dbUser,$dbPass,$db);*/
            $this->con = new PDO($dbDriver.':host='.$dbHost.';dbname='.$db, $dbUser, $dbPass);
        }

        public function query($sql){
            $this->connect();
            $rs = $this->con->query($sql);
            return $rs;
        }


        //validar correo
        public function validarCorreo($correo){
            if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        }

         //Manejador de mensajes 
         public function message($tipo,$texto){
            switch($tipo){
                case 0:
                    $color = "danger";
                     break;
                case 1:
                    $color = "success";
                    break;

                default: $color = "dark";
                    break;
            }
            require_once("message.php");
        }



        //Login
        public function login($correo,$pass){
            $this->connect();

            if($this->validarCorreo($correo)){
                $pass = md5($pass);
                $sql = "SELECT * FROM usuariopri 
                    WHERE correo = :correo 
                    and pass = :pass";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $stmt -> bindParam(':pass', $pass, PDO::PARAM_STR);
                $stmt->execute();
                $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(isset($datos[0])){
                    return true;
                }
                return false; 
            }
        }
    }

    $sistema = new Sistema();
?>