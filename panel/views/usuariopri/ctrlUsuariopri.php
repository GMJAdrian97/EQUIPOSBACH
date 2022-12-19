<?php
    require_once('mdlusuariopri.php');
    //$sistema -> validarusuariopri('Administrador');
    $id_usuariopri = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_usuariopri = isset($_GET['id_usuariopri']) ? $_GET['id_usuariopri'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        case 'readOne':
            $datosUsuariopri = $usuariopri->readOne($id_usuariopri);
            if(is_array($datosUsuariopri)){
                require_once('views/usuariopri/vistaUsuariopri.php');
            } else{
                //$usuariopri->message(0,"Ocurrio un error, el usuariopri no exixte");
                require_once('formularioUsuariopri.php');
            }
        break;

        case 'new':
            require_once('formularioUsuariopri.php');
        break;

        case 'add':  
            $datosUsuariopri = $_POST;
            $resultado = $usuariopri->create($datosUsuariopri);
            //$usuariopri->message($resultado, ($resultado)?"El usuariopri se agrego correctamente": "Ocurrio un error al agregar el usuariopri");
            $datosUsuariopris = $usuariopri->read();
            require_once('vistaUsuariopri.php');
        break;

        case 'modify':
            $datosUsuariopri = $usuariopri->readOne($id_usuariopri);
            //$datostipo = $usuariopri->read();
            if(is_array($datosUsuariopri)){
                require_once('formularioUsuariopri.php');
            } else{
                //$usuariopri->message(0,"Ocurrio un error, el usuariopri no exixte");
                require_once('vistaUsuariopri.php');
            }
        break;

        case 'update':
            $datosUsuariopri=$_POST;
            $resultado=$usuariopri->update($datosUsuariopri,$id_usuariopri);
            //$usuariopri->message($resultado, ($resultado)?"El usuariopri se modifco correctamente": "Ocurrio un error al modificar el usuariopri");
            $datosUsuariopris = $usuariopri->read();
            require_once('vistaUsuariopri.php');
        break;

        case 'delete':
            $resultado = $usuariopri->delete($id_usuariopri);
            //$usuariopri->message($resultado, ($resultado)?"El usuariopri se elimino correctamente": "Ocurrio un error al eliminar el usuariopri");
        default:
            $datosUsuariopris = $usuariopri->read();
            require_once('vistausuariopri.php');
    }


    require_once('../../../componentes/footer.php');


?>