<?php
    require_once('mdlEquipo.php');
    require_once('../marca/mdlMarca.php');
    require_once('../modelo/mdlModelo.php');
    //$sistema -> validarequipo('Administrador');
    $st = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $st = isset($_GET['st']) ? $_GET['st'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosEquipo = $equipo->readOne($st);
            if(is_array($datosEquipo)){
                require_once('views/Equipo/vitsaequipo.php');
            } else{
                //$equipo->message(0,"Ocurrio equipo error, el equipo no exixte");
                require_once('formularioEquipo.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosMarca = $marca->read();
            $datosModelo = $modelo->read();
            require_once('formularioEquipo.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosEquipo = $_POST;
            $resultado = $equipo->create($datosEquipo);
            //$equipo->message($resultado, ($resultado)?"El equipo se agrego correctamente": "Ocurrio equipo error al agregar el equipo");
            $datosEquipos = $equipo->read();
            require_once('vistaEquipo.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosEquipo = $equipo->readOne($st);
            $datosMarca = $marca->read();
            $datosModelo = $modelo->read();
            if(is_array($datosEquipo)){
                require_once('formularioEquipo.php');
            } else{
                //$equipo->message(0,"Ocurrio equipo error, el equipo no exixte");
                $datosEquipos = $equipo->read();
                require_once('vistaEquipo.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosEquipo=$_POST;
            $resultado=$equipo->update($datosEquipo,$st);
            //$equipo->message($resultado, ($resultado)?"El equipo se modifco correctamente": "Ocurrio equipo error al modificar el equipo");
            $datosEquipos = $equipo->read();
            require_once('vistaEquipo.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $equipo->delete($st);
            //$equipo->message($resultado, ($resultado)?"El equipo se elimino correctamente": "Ocurrio equipo error al eliminar el equipo");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosEquipos = $equipo->read();
            require_once('vistaEquipo.php');
    }


    //require_once('../../../Componentes/footer.php');


?>