<?php
require_once('../../../vendor/autoload.php');
    require_once('mdlTicketPC.php');
    require_once('../usuarios/mdlUsuario.php');
    require_once('../equipo/mdlEquipo.php');
    require_once('../renovacion/mdlRenovacion.php');
    //$sistema -> validarmarca('Administrador');
    $id_ticket = NULL; 
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_ticket = isset($_GET['id_ticket']) ? $_GET['id_ticket'] : NULL;
        $st = isset($_GET['st']) ? $_GET['st'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosTicketPC = $ticket_pc->readOne($id_ticket);
            if(is_array($datosTicketPC)){
                require_once('vistaTicket.php');
            } else{
                //$marca->message(0,"Ocurrio marca error, el marca no exixte");
                require_once('formularioTicketPC.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosRenovaciones = $renovacion->read();
            $datosEquipos = $equipo->readME();
            $datosUsuarios = $usuario->read();
            $datosTicketPCs = $ticket_pc->read();
            require_once('formularioTicketPC.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosTicketPC = $_POST;
            $resultado = $ticket_pc->create($datosTicketPC);
            //$marca->message($resultado, ($resultado)?"El marca se agrego correctamente": "Ocurrio marca error al agregar el marca");
            $datosTicketPCs = $ticket_pc->read();
            require_once('vistaTicket.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosTicketPC = $ticket_pc->readOne($id_ticket);
            $datosRenovaciones = $renovacion->read();
            $datosEquipos = $equipo->read();
            $datosUsuarios = $usuario->read();
            if(is_array($datosTicketPC)){
                require_once('formularioTicketPC.php');
            } else{
                //$marca->message(0,"Ocurrio marca error, el marca no exixte");
                $datosTicketPC = $ticket_pc->read();
                require_once('vistaTicket.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosTicketPC = $ticket_pc->readOne($id_ticket); // recuperamos los dato del registro a actuliazar 
            $STviejo = $datosTicketPC['st']; //asigno st viejo a actilizar
            $datosTicketPC = null; // borramos lo que contine la variable para posteriormnete llenarla con los datos que mandaremos con el fomulario de actualizar mediante POST
            $datosTicketPC=$_POST;
            $resultado=$ticket_pc->update($datosTicketPC,$id_ticket,$STviejo);
            //$marca->message($resultado, ($resultado)?"El marca se modifco correctamente": "Ocurrio marca error al modificar el marca");
            $datosTicketPCs = $ticket_pc->read();
            require_once('vistaTicket.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $datosTicketPC = $ticket_pc->readOne($st);
            $resultado = $ticket_pc->delete($id_ticket, $st);
            //$marca->message($resultado, ($resultado)?"El marca se elimino correctamente": "Ocurrio marca error al eliminar el marca");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosTicketPCs = $ticket_pc->read();
            require_once('vistaTicket.php');
    }


    require_once('../../../componentes/footer.php');


?>