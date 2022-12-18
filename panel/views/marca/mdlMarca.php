<?php
    require_once('../../sistema.php');

    class Marca extends Sistema{
        public $id_marca;
        public $nombre_marca_marca;
        public $id_modelo;

    
        public function getid_marca(){
            return $this->id_marca;
        }

        public function setid_marca($id_marca){
            $this->id_marca = $id_marca;
            return $this;
        }

        public function getnombre_marca_marca(){
            return $this->nombre_marca_marca;
        }

        public function setnombre_marca_marca($nombre_marca_marca){
            $this->nombre_marca_marca = $nombre_marca_marca;
            return $this;
        }

        public function getId_modelo(){
            return $this->id_modelo;
        }

        public function setId_modelo($id_modelo){
            $this->id_modelo = $id_modelo;
            return $this;
        }


        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT id_marca,
                           nombre_marca,
                           m.nombre_modelo
                     FROM marca
                     INNER JOIN modelo m on m.id_modelo = marca.id_modelo;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosMarcas = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosMarcas; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_marca){
            $this->conexion();
            $sql = "SELECT ma.id_marca,
                           ma.nombre_marca,
                           m.nombre_modelo
                     FROM marca ma
                     INNER JOIN modelo m on m.id_modelo = ma.id_modelo
                     WHERE id_marca = :id_marca;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $stmt->execute();
            $datosMarca = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosMarca = (isset($datosMarca[0]))?$datosMarca[0]:null;
            return $datosMarca;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosMarca){
            $this->conexion();
            $sql = "INSERT INTO marca (nombre_marca, id_modelo) VALUES (:nombre_marca, :id_modelo)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_marca', $datosMarca['nombre_marca'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_modelo', $datosMarca['id_modelo'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosMarca, $id_marca){
            $this->conexion();
            $sql = "UPDATE marca set 
                    nombre_marca = :nombre_marca,
                    id_modelo = :id_modelo 
                    WHERE id_marca = :id_marca";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_marca', $datosMarca['nombre_marca'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_modelo', $datosMarca['id_modelo'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_marca){
            $this->conexion();
            $sql = "DELETE FROM marca WHERE id_marca = :id_marca";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }

        
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $marca = new Marca();
?>