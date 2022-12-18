<?php
    require_once('../../sistema.php');

    class Modelo extends Sistema{
        public $id_modelo;
        public $nombre_modelo;

        public function getId_modelo(){
            return $this->id_modelo;
        }
 
        public function setId_modelo($id_modelo){
                $this->id_modelo = $id_modelo;
                return $this;
        }

        public function getNombre_modelo(){
            return $this->nombre_modelo;
        }

        public function setNombre_modelo($nombre_modelo){
            $this->nombre_modelo = $nombre_modelo;
            return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_modelo, 
                     nombre_modelo
                     FROM modelo;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosModelos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosModelos; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_modelo){
            $this->conexion();
            $sql = "SELECT nombre_modelo  
                        from modelo
                        WHERE id_modelo = :id_modelo;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_modelo', $id_modelo, PDO::PARAM_INT);
            $stmt->execute();
            $datosModelo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosModelo = (isset($datosModelo[0]))?$datosModelo[0]:null;
            return $datosModelo;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosModelo){
            $this->conexion();
            $sql = "INSERT INTO modelo (nombre_modelo) VALUES (:nombre_modelo)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_modelo', $datosModelo['nombre_modelo'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datos, $id_modelo){
            $this->conexion();
            $sql = "UPDATE modelo set 
                    nombre_modelo = :nombre_modelo 
                    WHERE id_modelo = :id_modelo";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_modelo', $datos['nombre_modelo'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_modelo', $id_modelo, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_modelo){
            $this->conexion();
            $sql = "DELETE FROM modelo WHERE id_modelo = :id_modelo";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_modelo', $id_modelo, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $modelo = new Modelo();
?>