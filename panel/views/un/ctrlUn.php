<?php
    require_once('mdlUn.php');
    //$sistema -> validarUn('Administrador');
    $id_un = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_un = isset($_GET['id_un']) ? $_GET['id_un'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosUn = $un->readOne($id_un);
            if(is_array($datosUn)){
                require_once('views/Un/vitsaUn.php');
            } else{
                //$Un->message(0,"Ocurrio un error, el Un no exixte");
                require_once('formularioUn.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formularioUn.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosUn = $_POST;
            $resultado = $un->create($datosUn);
            //$Un->message($resultado, ($resultado)?"El Un se agrego correctamente": "Ocurrio un error al agregar el Un");
            $datosUns = $un->read();
            require_once('vistaUn.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosUn = $un->readOne($id_un);
            //$datoUns = $Un->read();
            if(is_array($datosUn)){
                require_once('formularioUn.php');
            } else{
                //$Un->message(0,"Ocurrio un error, el Un no exixte");
                $datosUns = $un->read();
                require_once('vistaUn.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosUn=$_POST;
            $resultado=$un->update($datosUn,$id_un);
            //$Un->message($resultado, ($resultado)?"El Un se modifco correctamente": "Ocurrio un error al modificar el Un");
            $datosUns = $un->read();
            require_once('vistaUn.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $un->delete($id_un);
            //$Un->message($resultado, ($resultado)?"El Un se elimino correctamente": "Ocurrio un error al eliminar el Un");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosUns = $un->read();
            require_once('vistaUn.php');
    }


    //require_once('../../../Componentes/footer.php');


?>