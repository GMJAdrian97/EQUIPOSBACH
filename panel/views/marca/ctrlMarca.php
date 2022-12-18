<?php
    require_once('mdlMarca.php');
    require_once('../modelo/mdlModelo.php');
    //$sistema -> validarmarca('Administrador');
    $id_marca = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_marca = isset($_GET['id_marca']) ? $_GET['id_marca'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosMarca = $marca->readOne($id_marca);
            if(is_array($datosMarca)){
                require_once('views/marca/vitsaMarca.php');
            } else{
                //$marca->message(0,"Ocurrio marca error, el marca no exixte");
                require_once('formularioMarca.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosModelo = $modelo->read();
            require_once('formularioMarca.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosMarca = $_POST;
            $resultado = $marca->create($datosMarca);
            //$marca->message($resultado, ($resultado)?"El marca se agrego correctamente": "Ocurrio marca error al agregar el marca");
            $datosMarcas = $marca->read();
            require_once('vistaMarca.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosMarca = $marca->readOne($id_marca);
            $datosModelo = $modelo->read();
            if(is_array($datosMarca)){
                require_once('formularioMarca.php');
            } else{
                //$marca->message(0,"Ocurrio marca error, el marca no exixte");
                $datosMarcas = $marca->read();
                require_once('vistaMarca.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosMarca=$_POST;
            $resultado=$marca->update($datosMarca,$id_marca);
            //$marca->message($resultado, ($resultado)?"El marca se modifco correctamente": "Ocurrio marca error al modificar el marca");
            $datosMarcas = $marca->read();
            require_once('vistaMarca.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $marca->delete($id_marca);
            //$marca->message($resultado, ($resultado)?"El marca se elimino correctamente": "Ocurrio marca error al eliminar el marca");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosMarcas = $marca->read();
            require_once('vistaMarca.php');
    }


    //require_once('../../../Componentes/footer.php');


?>