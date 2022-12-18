<?php
    require_once('../../sistema.php');

    class Equipos extends Sistema{
        public $st;
        public $nombre_pc;
        public $descripcion;
        public $accesorios;
        public $tipo_equipo;
        public $precio_venta;
        public $precio_adquisicion;
        public $id_marca;
        public $modelo;
        public $estado;

    
        public function getSt(){
            return $this->st;
        }

        public function setSt($st){
            $this->st = $st;
            return $this;
        }

        public function getNombre_pc(){
            return $this->nombre_pc;
        }

        public function setNombre_pc($nombre_pc){
            $this->nombre_pc = $nombre_pc;
            return $this;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }

        public function getAccesorios(){
            return $this->accesorios;
        }

        public function setAccesorios($accesorios){
            $this->accesorios = $accesorios;
            return $this;
        }
 
        public function getTipo_equipo(){
            return $this->tipo_equipo;
        }

        public function setTipo_equipo($tipo_equipo){
            $this->tipo_equipo = $tipo_equipo;
            return $this;
        }

        public function getPrecio_venta(){
            return $this->precio_venta;
        }
 
        public function setPrecio_venta($precio_venta){
            $this->precio_venta = $precio_venta;
            return $this;
        }

        public function getPrecio_adquisicion(){
            return $this->precio_adquisicion;
        }

        public function setPrecio_adquisicion($precio_adquisicion){
            $this->precio_adquisicion = $precio_adquisicion;
            return $this;
        }

        public function getId_marca(){
            return $this->id_marca;
        }

        public function setId_marca($id_marca){
            $this->id_marca = $id_marca;
            return $this;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
            return $this;
        }
 
        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
            return $this;
        }


        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT e.st,
                           e.nombre_pc,
                           e.descripcion,
                           e.accesorios,
                           e.tipo_equipo,
                           e.precio_venta,
                           e.precio_adquisicion,
                           m.nombre_marca AS marca,
                           e.modelo AS modelo,
                           e.estado
                    FROM equipo e
                    INNER JOIN marca m on m.id_marca = e.id_marca;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquipos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquipos; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($st){
            $this->conexion();
            $sql = "SELECT e.st,
                            e.nombre_pc,
                            e.descripcion,
                            e.accesorios,
                            e.tipo_equipo,
                            e.precio_venta,
                            e.precio_adquisicion,
                            m.nombre_marca AS marca,
                            e.modelo AS modelo,
                            e.estado
                    FROM equipo e
                    INNER JOIN marca m on m.id_marca = e.id_marca
                    WHERE e.st = :st;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':st', $st, PDO::PARAM_STR);
            $stmt->execute();
            $datosEquipo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosEquipo = (isset($datosEquipo[0]))?$datosEquipo[0]:null;
            return $datosEquipo;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosEquipo){
            $this->conexion();
            $sql = "INSERT INTO equipo (st, 
                                        nombre_pc, 
                                        descripcion, 
                                        accesorios, 
                                        tipo_equipo, 
                                        precio_venta, 
                                        precio_adquisicion, 
                                        id_marca, 
                                        modelo,
                                        estado) 
                            VALUES  (:st, 
                                    :nombre_pc,
                                    :descripcion, 
                                    :accesorios, 
                                    :tipo_equipo, 
                                    :precio_venta, 
                                    :precio_adquisicion, 
                                    :id_marca, 
                                    :modelo,
                                    :estado)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':st', $datosEquipo['st'], PDO::PARAM_STR);
            $stmt -> bindParam(':nombre_pc', $datosEquipo['nombre_pc'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datosEquipo['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':accesorios', $datosEquipo['accesorios'], PDO::PARAM_STR);
            $stmt -> bindParam(':tipo_equipo', $datosEquipo['tipo_equipo'], PDO::PARAM_STR);
            $stmt -> bindParam(':precio_venta', $datosEquipo['precio_venta'], PDO::PARAM_INT);
            $stmt -> bindParam(':precio_adquisicion', $datosEquipo['precio_adquisicion'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_marca', $datosEquipo['id_marca'], PDO::PARAM_INT);
            $stmt -> bindParam(':modelo', $datosEquipo['id_modelo'], PDO::PARAM_STR);
            $stmt -> bindParam(':estado', $datosEquipo['estado'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosEquipo, $st){
            
            $this->conexion();
            $sql = "UPDATE equipo set 
                            nombre_pc = :nombre_pc, 
                            descripcion = :descripcion, 
                            accesorios = :accesorios, 
                            tipo_equipo = :tipo_equipo, 
                            precio_venta =:precio_venta, 
                            precio_adquisicion = :precio_adquisicion, 
                            id_marca = :id_marca, 
                            modelo = :id_modelo,
                            estado = :estado
                    WHERE st = :st";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre_pc', $datosEquipo['nombre_pc'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datosEquipo['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':accesorios', $datosEquipo['accesorios'], PDO::PARAM_STR);
            $stmt -> bindParam(':tipo_equipo', $datosEquipo['tipo_equipo'], PDO::PARAM_STR);
            $stmt -> bindParam(':precio_venta', $datosEquipo['precio_venta'], PDO::PARAM_INT);
            $stmt -> bindParam(':precio_adquisicion', $datosEquipo['precio_adquisicion'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_marca', $datosEquipo['id_marca'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_modelo', $datosEquipo['id_modelo'], PDO::PARAM_STR);
            $stmt -> bindParam(':estado', $datosEquipo['estado'], PDO::PARAM_STR);
            $stmt -> bindParam(':st', $st, PDO::PARAM_STR);
            $rs = $stmt -> execute();
            return $rs;
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($st){
            $this->conexion();
            $sql = "DELETE FROM equipo WHERE st = :st";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':st', $st, PDO::PARAM_STR);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }


        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function readME(){
            $this->conexion();
            $sql = "SELECT e.st,
                           e.nombre_pc,
                           e.descripcion,
                           e.accesorios,
                           e.tipo_equipo,
                           e.precio_venta,
                           e.precio_adquisicion,
                           m.nombre_marca AS marca,
                           e.modelo AS modelo,
                           e.estado
                    FROM equipo e
                    INNER JOIN marca m on m.id_marca = e.id_marca
                    WHERE e.estado = 'Disponible';";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquipos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquipos; 
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $equipo = new Equipos();
?>