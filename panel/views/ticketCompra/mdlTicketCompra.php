<?php
    require_once('../../sistema.php');

    class Ticket_compra extends Sistema{
        public $id_compra;
        public $fecha;
        public $descripcion;
        public $no_empleado;
        public $st;
        

        public function getId_compra(){
            return $this->id_compra;
        }

        public function setId_compra($id_compra){
            $this->id_compra = $id_compra;
            return $this;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
            return $this;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }

        public function getNo_empleado(){
            return $this->no_empleado;
        }

        public function setNo_empleado($no_empleado){
            $this->no_empleado = $no_empleado;
            return $this;
        }

        public function getSt(){
            return $this->st;
        }

        public function setSt($st){
            $this->st = $st;
            return $this;
        }
        
        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT tc.id_compra,
                            tc.fecha,
                            tc.descripcion,
                            u.nombre AS 'empleado',
                            e.st
                    FROM ticket_compra tc
                    INNER JOIN usuario u on u.no_empleado = tc.no_empleado
                    INNER JOIN equipo e on e.st = tc.st;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosTicketCompras = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosTicketCompras; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_compra){
            $this->conexion();
            $sql = "SELECT
                            tc.descripcion,
                            u.nombre AS 'empleado',
                            e.st
                    FROM ticket_compra tc
                    INNER JOIN usuario u on u.no_empleado = tc.no_empleado
                    INNER JOIN equipo e on e.st = tc.st
                    WHERE tc.id_compra = :id_compra;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_compra', $id_compra, PDO::PARAM_INT);
            $stmt->execute();
            $datosTicketCompra = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosTicketCompra = (isset($datosTicketCompra[0]))?$datosTicketCompra[0]:null;
            return $datosTicketCompra;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosTicketCompra){
            $this->conexion();
            $sql = "INSERT INTO ticket_compra (fecha, 
                                           descripcion,
                                           no_empleado,
                                           st) 
                    VALUES (now(), 
                            :descripcion,
                            :no_empleado,
                            :st)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosTicketCompra['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_empleado', $datosTicketCompra['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':st', $datosTicketCompra['st'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosTicketCompra, $id_compra){
            $this->conexion();
            $sql = "UPDATE ticket_compra set 
                            descripcion = :descripcion,
                            no_empleado = :no_empleado,
                            st = :st
                    WHERE id_compra = :id_compra";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosTicketCompra['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_empleado', $datosTicketCompra['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':st', $datosTicketCompra['st'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_compra', $id_compra, PDO::PARAM_INT);
            $rs = $stmt -> execute();
            return $rs;
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_compra){
            $this->conexion();
            $sql = "DELETE FROM ticket_compra WHERE id_compra = :id_compra";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_compra', $id_compra, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }


        
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $ticket_compra = new Ticket_compra();
?>