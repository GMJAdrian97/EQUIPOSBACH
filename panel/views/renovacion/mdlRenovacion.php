<?php
    require_once('../../sistema.php');

    class Renovacion extends Sistema{
        public $id_renovacion; 
        public $descipcion_renovacion;


        public function getId_renovacion(){
            return $this->id_renovacion;
        }

        public function setId_renovacion($id_renovacion){
            $this->id_renovacion = $id_renovacion;
            return $this;
        }

        public function getDescipcion_renovacion(){
            return $this->descipcion_renovacion;
        }

        public function setDescipcion_renovacion($descipcion_renovacion){
                $this->descipcion_renovacion = $descipcion_renovacion;
                return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_renovacion, 
                     descipcion_renovacion
                     FROM renovacion;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosRenovaciones = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosRenovaciones; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_renovacion){
            $this->conexion();
            $sql = "SELECT descipcion_renovacion  
                        from renovacion
                        WHERE id_renovacion = :id_renovacion;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_renovacion', $id_renovacion, PDO::PARAM_INT);
            $stmt->execute();
            $datosRenovacion = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosRenovacion = (isset($datosRenovacion[0]))?$datosRenovacion[0]:null;
            return $datosRenovacion;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosRenovacion){
            $this->conexion();
            $sql = "INSERT INTO renovacion (descipcion_renovacion) VALUES (:descipcion_renovacion)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descipcion_renovacion', $datosRenovacion['descipcion_renovacion'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datos, $id_renovacion){
            $this->conexion();
            $sql = "UPDATE renovacion set 
                    descipcion_renovacion = :descipcion_renovacion 
                    WHERE id_renovacion = :id_renovacion";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descipcion_renovacion', $datos['descipcion_renovacion'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_renovacion', $id_renovacion, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_renovacion){
            $this->conexion();
            $sql = "DELETE FROM renovacion WHERE id_renovacion = :id_renovacion";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_renovacion', $id_renovacion, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $renovacion = new Renovacion();
?>