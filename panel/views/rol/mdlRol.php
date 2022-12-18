<?php
    require_once('../../sistema.php');


    class Rol extends Sistema{

        public $id_rol;
        public $nombre_rol;


        public function getId_rol(){
            return $this->id_rol;
        }

    
        public function setId_rol($id_rol){
            $this->id_rol = $id_rol;
            return $this;
        }


        public function getRol(){
            return $this->nombre_rol;
        }

    
        public function setRol($nombre_rol){
            $this->nombre_rol = $nombre_rol;
            return $this;
        }


        public function read(){
            $this->conexion();
            $sql = "SELECT id_rol, 
                     nombre_rol
                     FROM rol;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosRoles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosRoles; 
        }

        public function readOne($id_rol){
            $this->conexion();
            $sql = "SELECT nombre_rol  
                        from rol
                        WHERE rol.id_rol = :id_rol;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = (isset($datos[0]))?$datos[0]:null;
            return $datos;
        }

        public function create($datosRol){
            $this->conexion();
            $sql = "INSERT INTO rol (nombre_rol) VALUES (:nombre_rol)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_rol', $datosRol['nombre_rol'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        public function update($datosRol, $id_rol){
            $this->conexion();
            $sql = "UPDATE rol set 
                    nombre_rol = :nombre_rol 
                    WHERE id_rol = :id_rol";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_rol', $datosRol['nombre_rol'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        public function delete($id_rol){
            $this->conexion();
            $sql = "DELETE FROM rol WHERE id_rol = :id_rol";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }

    }

    $rol = new Rol();

?>