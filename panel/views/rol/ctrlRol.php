<?php
    require_once('mdlRol.php');
    //$sistema -> validarRol('Administrador');
    $id_rol = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL;
        $accion = $_GET['accion'];
    }

   // require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        case 'readOne':
            $datos = $rol->readOne($id_rol);
            if(is_array($datos)){
                require_once('views/rol/vistaRol.php');
            } else{
                //$rol->message(0,"Ocurrio un error, el rol no exixte");
                require_once('formularioRol.php');
            }
        break;

        case 'new':
            require_once('formularioRol.php');
        break;

        case 'add':  
            $datosRol = $_POST;
            $resultado = $rol->create($datosRol);
            //$rol->message($resultado, ($resultado)?"El rol se agrego correctamente": "Ocurrio un error al agregar el rol");
            $datosRoles = $rol->read();
            require_once('vistaRol.php');
        break;

        case 'modify':
            $datosRol = $rol->readOne($id_rol);
            //$datostipo = $rol->read();
            if(is_array($datosRol)){
                require_once('formularioRol.php');
            } else{
                //$rol->message(0,"Ocurrio un error, el rol no exixte");
                require_once('vistaRol.php');
            }
        break;

        case 'update':
            $datosRol=$_POST;
            $resultado=$rol->update($datosRol,$id_rol);
            //$rol->message($resultado, ($resultado)?"El rol se modifco correctamente": "Ocurrio un error al modificar el rol");
            $datosRoles = $rol->read();
            require_once('vistaRol.php');
        break;

        case 'delete':
            $resultado = $rol->delete($id_rol);
            //$rol->message($resultado, ($resultado)?"El rol se elimino correctamente": "Ocurrio un error al eliminar el rol");
        default:
            $datosRoles = $rol->read();
            require_once('vistaRol.php');
    }


    //require_once('../../../Componentes/footer.php');


?>