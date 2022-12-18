<?php
    require_once('../../sistema.php');

    class Departamento extends Sistema{
        public $id_departamento;
        public $nombreD;

        public function getId_departamento(){
            return $this->id_departamento;
        }
 
        public function setId_departamento($id_departamento){
            $this->id_departamento = $id_departamento;
            return $this;
        }

        public function getNombreD(){
            return $this->nombreD;
        }

        public function setNombreD($nombreD){
            $this->nombreD = $nombreD;
            return $this;
        }

        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_departamento, 
                     nombreD
                     FROM departamento;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosDepartamentos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosDepartamentos; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_departamento){
            $this->conexion();
            $sql = "SELECT nombreD  
                        from departamento
                        WHERE id_departamento = :id_departamento;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
            $stmt->execute();
            $datosDepartamento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosDepartamento = (isset($datosDepartamento[0]))?$datosDepartamento[0]:null;
            return $datosDepartamento;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosDepartamento){
            $this->conexion();
            $sql = "INSERT INTO departamento (nombreD) VALUES (:nombreD)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombreD', $datosDepartamento['nombreD'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datos, $id_departamento){
            $this->conexion();
            $sql = "UPDATE departamento set 
                    nombreD = :nombreD 
                    WHERE id_departamento = :id_departamento";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombreD', $datos['nombreD'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_departamento){
            $this->conexion();
            $sql = "DELETE FROM departamento WHERE id_departamento = :id_departamento";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_departamento', $id_departamento, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $departamento = new Departamento();
?>