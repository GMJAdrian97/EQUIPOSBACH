<?php
    require_once('mdlDepartamento.php');
    //$sistema -> validardepartamento('Administrador');
    $id_departamento = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_departamento = isset($_GET['id_departamento']) ? $_GET['id_departamento'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosDepartamento = $departamento->readOne($id_departamento);
            if(is_array($datosDepartamento)){
                require_once('views/departamento/index.php');
            } else{
                $departamento->message(0,"Ocurrio un error, el departamento no exixte");
                require_once('formularioDepartamento.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formularioDepartamento.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosDepartamento = $_POST;
            $resultado = $departamento->create($datosDepartamento);
            //$departamento->message($resultado, ($resultado)?"El departamento se agrego correctamente": "Ocurrio un error al agregar el departamento");
            $datosDepartamentos = $departamento->read();
            require_once('vistaDepartamento.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosDepartamento = $departamento->readOne($id_departamento);
            //$datodepartamentos = $departamento->read();
            if(is_array($datosDepartamento)){
                require_once('formularioDepartamento.php');
            } else{
                //$departamento->message(0,"Ocurrio un error, el departamento no exixte");
                $datosDepartamentos = $departamento->read();
                require_once('vistaDepartamento.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosDepartamento=$_POST;
            $resultado=$departamento->update($datosDepartamento,$id_departamento);
            //$departamento->message($resultado, ($resultado)?"El departamento se modifco correctamente": "Ocurrio un error al modificar el departamento");
            $datosDepartamentos = $departamento->read();
            require_once('vistaDepartamento.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $departamento->delete($id_departamento);
            //$departamento->message($resultado, ($resultado)?"El departamento se elimino correctamente": "Ocurrio un error al eliminar el departamento");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosDepartamentos = $departamento->read();
            require_once('vistaDepartamento.php');
    }


    require_once('../../../componentes/footer.php');


?>