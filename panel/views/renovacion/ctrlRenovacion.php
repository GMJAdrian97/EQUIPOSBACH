<?php
    require_once('mdlRenovacion.php');
    //$sistema -> validarRenovacion('Administrador');
    $id_renovacion = NULL; 
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_renovacion = isset($_GET['id_renovacion']) ? $_GET['id_renovacion'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosRenovacion = $renovacion->readOne($id_renovacion);
            if(is_array($datosRenovacion)){
                require_once('views/Renovacion/vitsaRenovacion.php');
            } else{
                //$Renovacion->message(0,"Ocurrio un error, el Renovacion no exixte");
                require_once('formularioRenovacion.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formularioRenovacion.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosRenovacion = $_POST;
            $resultado = $renovacion->create($datosRenovacion);
            //$Renovacion->message($resultado, ($resultado)?"El Renovacion se agrego correctamente": "Ocurrio un error al agregar el Renovacion");
            $datosRenovaciones = $renovacion->read();
            require_once('vistaRenovacion.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosRenovacion = $renovacion->readOne($id_renovacion);
            //$datoRenovacions = $Renovacion->read();
            if(is_array($datosRenovacion)){
                require_once('formularioRenovacion.php');
            } else{
                //$Renovacion->message(0,"Ocurrio un error, el Renovacion no exixte");
                $datosRenovaciones = $renovacion->read();
                require_once('vistaRenovacion.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosRenovacion=$_POST;
            $resultado=$renovacion->update($datosRenovacion,$id_renovacion);
            //$Renovacion->message($resultado, ($resultado)?"El Renovacion se modifco correctamente": "Ocurrio un error al modificar el Renovacion");
            $datosRenovaciones = $renovacion->read();
            require_once('vistaRenovacion.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $renovacion->delete($id_renovacion);
            //$Renovacion->message($resultado, ($resultado)?"El Renovacion se elimino correctamente": "Ocurrio un error al eliminar el Renovacion");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosRenovaciones = $renovacion->read();
            require_once('vistaRenovacion.php');
    }


    require_once('../../../componentes/footer.php');


?>