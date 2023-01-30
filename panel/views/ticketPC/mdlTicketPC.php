<?php
    require_once('../../sistema.php');

    class Ticket_pc extends Sistema{
        public $id_ticket;
        public $fecha;
        public $descripcion;
        public $contraseña_admin;
        public $contraseña_system;
        public $contraseña_disco;
        public $contraseña_Wiadmin;
        public $no_empleado;
        public $st;
        public $id_renovacion;

        public function getId_ticket(){
            return $this->id_ticket;
        }

        public function setId_ticket($id_ticket){
            $this->id_ticket = $id_ticket;
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

        public function getContraseña_admin(){
            return $this->contraseña_admin;
        }

        public function setContraseña_admin($contraseña_admin){
            $this->contraseña_admin = $contraseña_admin;
            return $this;
        }

        public function getContraseña_system(){
            return $this->contraseña_system;
        }

        public function setContraseña_system($contraseña_system){
            $this->contraseña_system = $contraseña_system;
            return $this;
        }

        public function getContraseña_disco(){
            return $this->contraseña_disco;
        }

        public function setContraseña_disco($contraseña_disco){
            $this->contraseña_disco = $contraseña_disco;
            return $this;
        }

        public function getContraseña_Wiadmin(){
            return $this->contraseña_Wiadmin;
        }

        public function setContraseña_Wiadmin($contraseña_Wiadmin){
            $this->contraseña_Wiadmin = $contraseña_Wiadmin;
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

        public function getId_renovacion(){
            return $this->id_renovacion;
        }

        public function setId_renovacion($id_renovacion){
            $this->id_renovacion = $id_renovacion;
            return $this;
        }
        
        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT tp.id_ticket,
                            tp.fecha,
                            tp.descripcion,
                            tp.contrasena_admin,
                            tp.contrasena_system,
                            tp.contrasena_disco,
                            tp.contrasena_Wiadmin,
                            u.nombre AS 'empleado',
                            e.st,
                            r.descipcion_renovacion AS 'accion'
                    FROM ticket_pc tp
                    INNER JOIN usuario u on u.no_empleado = tp.no_empleado
                    INNER JOIN equipo e on e.st = tp.st
                    INNER JOIN renovacion r on r.id_renovacion = tp.id_renovacion;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosTicketPCs = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosTicketPCs; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($id_ticket){
            $this->conexion();
            $sql = "SELECT
                            tp.descripcion,
                            tp.contrasena_admin,
                            tp.contrasena_system,
                            tp.contrasena_disco,
                            tp.contrasena_Wiadmin,
                            u.nombre AS 'empleado',
                            e.st,
                            r.descipcion_renovacion AS 'accion'
                    FROM ticket_pc tp
                    INNER JOIN usuario u on u.no_empleado = tp.no_empleado
                    INNER JOIN equipo e on e.st = tp.st
                    INNER JOIN renovacion r on r.id_renovacion = tp.id_renovacion
                    WHERE tp.id_ticket = :id_ticket;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
            $stmt->execute();
            $datosTicketPC = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosTicketPC = (isset($datosTicketPC[0]))?$datosTicketPC[0]:null;
            return $datosTicketPC;
        }

        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosTicketPC){
            $this->conexion();
            $this->con->beginTransaction();
            try{
                $sql = "INSERT INTO ticket_pc (fecha, 
                                               descripcion,
                                               contrasena_admin,
                                               contrasena_system,
                                               contrasena_disco,
                                               contrasena_Wiadmin,
                                               no_empleado,
                                               st,
                                               id_renovacion) 
                        VALUES (now(), 
                                :descripcion,
                                :contrasena_admin,
                                :contrasena_system,
                                :contrasena_disco,
                                :contrasena_Wiadmin,
                                :no_empleado,
                                :st,
                                :id_renovacion)"; 
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':descripcion', $datosTicketPC['descripcion'], PDO::PARAM_STR);
                $stmt -> bindParam(':contrasena_admin', $datosTicketPC['contrasena_admin'], PDO::PARAM_STR);
                $stmt -> bindParam(':contrasena_system', $datosTicketPC['contrasena_system'], PDO::PARAM_STR);
                $stmt -> bindParam(':contrasena_disco', $datosTicketPC['contrasena_disco'], PDO::PARAM_STR);
                $stmt -> bindParam(':contrasena_Wiadmin', $datosTicketPC['contrasena_Wiadmin'], PDO::PARAM_STR);
                $stmt -> bindParam(':no_empleado', $datosTicketPC['no_empleado'], PDO::PARAM_INT);
                $stmt -> bindParam(':st', $datosTicketPC['st'], PDO::PARAM_STR);
                $stmt -> bindParam(':id_renovacion', $datosTicketPC['id_renovacion'], PDO::PARAM_INT);
                $rs = $stmt->execute();
                if ($stmt->rowCount()>0) {
                    if($datosTicketPC['id_renovacion'] == 1){
                        $sql =  "UPDATE equipo SET 
                                    estado = 'Ocupado' 
                            WHERE   st = :st";
                        $stmt = $this->con->prepare($sql);
                        $stmt -> bindParam(':st', $datosTicketPC['st'], PDO::PARAM_STR);
                        $rs = $stmt->execute();
                        $this->con->commit();
                    }else{
                        if($datosTicketPC['id_renovacion'] == 4){
                            $sql =  "UPDATE equipo SET 
                                        estado = 'Prestamo' 
                                WHERE   st = :st";
                            $stmt = $this->con->prepare($sql);
                            $stmt -> bindParam(':st', $datosTicketPC['st'], PDO::PARAM_STR);
                            $rs = $stmt->execute();
                            $this->con->commit();
                        }
                    }
                }
                
                return true;
            }catch (Exception $e){
            $this->con->rollback();
            return false;
            }
            return false;
            
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosTicketPC, $id_ticket, $STviejo){
            $this->conexion();
            $sql = "UPDATE ticket_pc set 
                            descripcion = :descripcion,
                            contrasena_admin = :contrasena_admin,
                            contrasena_system = :contrasena_system,
                            contrasena_disco = :contrasena_disco,
                            contrasena_Wiadmin = :contrasena_Wiadmin,
                            no_empleado = :no_empleado,
                            st = :st,
                            id_renovacion = :id_renovacion
                    WHERE id_ticket = :id_ticket";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':descripcion', $datosTicketPC['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':contrasena_admin', $datosTicketPC['contrasena_admin'], PDO::PARAM_STR);
            $stmt -> bindParam(':contrasena_system', $datosTicketPC['contrasena_system'], PDO::PARAM_STR);
            $stmt -> bindParam(':contrasena_disco', $datosTicketPC['contrasena_disco'], PDO::PARAM_STR);
            $stmt -> bindParam(':contrasena_Wiadmin', $datosTicketPC['contrasena_Wiadmin'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_empleado', $datosTicketPC['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':st', $datosTicketPC['st'], PDO::PARAM_STR);
            $stmt -> bindParam(':id_renovacion', $datosTicketPC['id_renovacion'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
            $rs = $stmt -> execute();
            return $rs;
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($id_ticket, $st){
            $this->conexion();
            $this->con->beginTransaction();
            try{
                $sql = "DELETE FROM ticket_pc WHERE id_ticket = :id_ticket";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
                $rs = $stmt->execute();
                if ($stmt->rowCount()>0) {
                    $sql =  "UPDATE equipo SET 
                                    estado = 'Disponible' 
                            WHERE   st = :st";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':st', $st, PDO::PARAM_STR);
                    $rs = $stmt->execute();
                    $this->con->commit();
                }
                
                return true;
            }catch (Exception $e){
            $this->con->rollback();
            return false;
            }
            return false;
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $ticket_pc = new Ticket_pc();
?>