<?php
    require_once('../../sistema.php');

    class TicketPDF extends Sistema{
        public function ticket($id_ticket){
            $this->conexion();
            $sql="SELECT un.nombre as divicion,
                        u.nombre as nombreEm,
                        p.nombre as puesto,
                        d.nombreD as centroTrabajo,
                        e.st as ST,
                        e.accesorios,
                        m.nombre_marca as marca,
                        mo.nombre_modelo as modelo
                FROM ticket_pc
                INNER JOIN usuario u on u.no_empleado = ticket_pc.no_empleado
                INNER JOIN un un on un.id_un = u.id_un
                INNER JOIN puesto p on p.id_puesto = u.id_puesto
                INNER JOIN departamento d on d.id_departamento = u.id_departamento
                INNER JOIN equipo e on e.st = ticket_pc.st
                INNER JOIN marca m on m.id_marca = e.id_marca
                INNER JOIN modelo mo on mo.id_modelo = m.id_modelo
                where id_ticket=:id_ticket;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
            $stmt->execute();
            $ticketPDF = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ticketPDF = (isset($ticketPDF[0]))?$ticketPDF[0]:null;
            if(!is_null($ticketPDF)){
                $pdfHTML=include('vistaPDF.php');
            }
            else{
                $pdfHTML='no se encontraron resultados';
            }
            return $pdfHTML;
    }
    }
    $ticketPDF = new TicketPDF();
?>