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
         public function message($texto){
            require_once("modal.php");
        }
    }

    $sistema = new Sistema();
?>