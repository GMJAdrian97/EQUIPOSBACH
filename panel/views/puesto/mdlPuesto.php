<?php
    require_once('../../sistema.php');

    class Puesto extends Sistema{
        public $id_puesto;
        public $nombre;

        public function getId_puesto(){
            return $this->id_puesto;
        }

        public function setId_puesto($id_puesto){
                $this->id_puesto = $id_puesto;
                return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
                $this->nombre = $nombre;
                return $this;
        }


        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_puesto, 
                     nombre
                     FROM puesto;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosPuestos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosPuestos; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_puesto){
            $this->conexion();
            $sql = "SELECT nombre  
                        from puesto
                        WHERE id_puesto = :id_puesto;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_puesto', $id_puesto, PDO::PARAM_INT);
            $stmt->execute();
            $datosPuesto = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosPuesto = (isset($datosPuesto[0]))?$datosPuesto[0]:null;
            return $datosPuesto;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosPuesto){
            $this->conexion();
            $sql = "INSERT INTO puesto (nombre) VALUES (:nombre)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosPuesto['nombre'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosPuesto, $id_puesto){
            $this->conexion();
            $sql = "UPDATE puesto set 
                    nombre = :nombre 
                    WHERE id_puesto = :id_puesto";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosPuesto['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_puesto', $id_puesto, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_puesto){
            $this->conexion();
            $sql = "DELETE FROM puesto WHERE id_puesto = :id_puesto";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_puesto', $id_puesto, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }

    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $puesto = new Puesto();
?>