<?php
    require_once('../../sistema.php');
    require_once('../usuariopri/mdlUsuariopri.php');
    $accion = NULL;
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }

    switch($accion){

        case 'login';
                $datos = $_POST;
                if($usuariopri->login($datos['correo'], $datos['pass'])){
                    $usuariopri -> credentials($datos['correo']);
                    print_r($_SESSION['roles']);
                    switch($_SESSION['roles'][0]){
                        case 'Administrador':
                            header('Location: ../index.php');
                        break;

                        case 'Empleado':
                           
                        break;
                        

                        default: //cliente
                        header('Location: ../index2.php');
                    }
                }
                else{
                    $sistema -> message(0,"Usuario o contraseña invalidas, porfavor ingresa campos validos");
                    $sistema -> logOut();
                    require_once('viewLog.php');
                    }
        break;

        case 'logOut';
                $sistema -> message(1,"La sesion se ha cerrado");
                $sistema -> logOut();
                header('Location: CtrlLogin.php');
                break;
        default:
        require_once('viewLog.php');
    }
?>