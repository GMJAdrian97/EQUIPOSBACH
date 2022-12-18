<?php
    require_once('mdlTicketCompra.php');
    require_once('../usuarios/mdlUsuario.php');
    require_once('../equipo/mdlEquipo.php');
    require_once('../renovacion/mdlRenovacion.php');
    //$sistema -> validarmarca('Administrador');
    $id_compra = NULL; 
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_compra = isset($_GET['id_compra']) ? $_GET['id_compra'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosTicketCompra = $ticket_compra->readOne($id_compra);
            if(is_array($datosTicketCompra)){
                require_once('vistaTicketCompra.php');
            } else{
                //$marca->message(0,"Ocurrio marca error, el marca no exixte");
                require_once('formularioTicketCompra.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosRenovaciones = $renovacion->read();
            $datosEquipos = $equipo->read();
            $datosUsuarios = $usuario->read();
            $datosTicketCompras = $ticket_compra->read();
            require_once('formularioTicketCompra.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosTicketCompra = $_POST;
            $resultado = $ticket_compra->create($datosTicketCompra);
            //$marca->message($resultado, ($resultado)?"El marca se agrego correctamente": "Ocurrio marca error al agregar el marca");
            $datosTicketCompras = $ticket_compra->read();
            require_once('vistaTicketCompra.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosTicketCompra = $ticket_compra->readOne($id_compra);
            $datosRenovaciones = $renovacion->read();
            $datosEquipos = $equipo->read();
            $datosUsuarios = $usuario->read();
            if(is_array($datosTicketCompra)){
                require_once('formularioTicketCompra.php');
            } else{
                //$marca->message(0,"Ocurrio marca error, el marca no exixte");
                $datosTicketCompras = $ticket_compra->read();
                require_once('vistaTicketCompra.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosTicketCompra=$_POST;
            $resultado=$ticket_compra->update($datosTicketCompra,$id_compra);
            //$marca->message($resultado, ($resultado)?"El marca se modifco correctamente": "Ocurrio marca error al modificar el marca");
            $datosTicketCompras = $ticket_compra->read();
            require_once('vistaTicketCompra.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $ticket_compra->delete($id_compra);
            //$marca->message($resultado, ($resultado)?"El marca se elimino correctamente": "Ocurrio marca error al eliminar el marca");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosTicketCompras = $ticket_compra->read();
            require_once('vistaTicketCompra.php');
    }


    //require_once('../../../Componentes/footer.php');


?>