<?php
    require_once('../sistema.php');

    class Grafica extends Sistema{
    
        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function readPCs(){
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
        
        public function readEquiposOcupados(){
            $this->conexion();
            $sql = "SELECT COUNT(*) AS ocupado FROM equipo WHERE estado = 'Ocupado';";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquipos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquipos; 
        }

        public function readEquiposDispo(){
            $this->conexion();
            $sql = "SELECT COUNT(*) AS disponible FROM equipo WHERE estado = 'Disponible';";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquipos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquipos; 
        }

        public function readEquiposPres(){
            $this->conexion();
            $sql = "SELECT COUNT(*) AS prestamo FROM equipo WHERE estado = 'Prestamo';";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquipos = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquipos; 
        }

        public function readEquiposLaptop(){
            $this->conexion();
            $sql = "SELECT COUNT(*) AS laptop FROM equipo WHERE tipo_equipo = 'Laptop';";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquiposLaptop = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquiposLaptop; 
        }

        public function readEquiposDesktop(){
            $this->conexion();
            $sql = "SELECT COUNT(*) AS desktop FROM equipo WHERE tipo_equipo = 'Desktop';";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquiposLaptop = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquiposLaptop; 
        }

        public function readEquiposTablet(){
            $this->conexion();
            $sql = "SELECT COUNT(*) AS tablet FROM equipo WHERE tipo_equipo = 'Tablet';";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosEquiposLaptop = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosEquiposLaptop; 
        }


        public function readTC(){
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

    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $grafica = new Grafica();
?>