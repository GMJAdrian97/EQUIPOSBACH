<?php
    require_once('mdlUsuario.php');
    require_once('../un/mdlUn.php');
    require_once('../puesto/mdlPuesto.php');
    require_once('../departamento/mdlDepartamento.php');
    //$sistema -> validarusuario('Administrador');
    $no_empleado = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $no_empleado = isset($_GET['no_empleado']) ? $_GET['no_empleado'] : NULL;
        $accion = $_GET['accion'];
    }

    //require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosUsuario = $usuario->readOne($no_empleado);
            if(is_array($datosUsuario)){
                require_once('views/usuario/vitsaUsuario.php');
            } else{
                //$usuario->message(0,"Ocurrio usuario error, el usuario no exixte");
                require_once('formularioUsuario.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            $datosDepartamento = $departamento->read();
            $datosPuesto = $puesto->read();
            $datosUn = $un->read();
            require_once('formularioUsuario.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosUsuario = $_POST;
            $resultado = $usuario->create($datosUsuario);
            //$usuario->message($resultado, ($resultado)?"El usuario se agrego correctamente": "Ocurrio usuario error al agregar el usuario");
            $datosUsuarios = $usuario->read();
            require_once('vistaUsuario.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosUsuario = $usuario->readOne($no_empleado);
            $datosDepartamento = $departamento->read();
            $datosPuesto = $puesto->read();
            $datosUn = $un->read();
            if(is_array($datosUsuario)){
                require_once('formularioUsuario.php');
            } else{
                //$usuario->message(0,"Ocurrio usuario error, el usuario no exixte");
                $datosUsuarios = $usuario->read();
                require_once('vistaUsuario.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosUsuario=$_POST;
            $resultado=$usuario->update($datosUsuario,$no_empleado);
            //$usuario->message($resultado, ($resultado)?"El usuario se modifco correctamente": "Ocurrio usuario error al modificar el usuario");
            $datosUsuarios = $usuario->read();
            require_once('vistaUsuario.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $usuario->delete($no_empleado);
            //$usuario->message($resultado, ($resultado)?"El usuario se elimino correctamente": "Ocurrio usuario error al eliminar el usuario");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosUsuarios = $usuario->read();
            require_once('vistaUsuario.php');
    }


    //require_once('../../../Componentes/footer.php');


?>