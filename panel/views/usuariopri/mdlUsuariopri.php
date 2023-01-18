<?php
    require_once('../../sistema.php');
    
    

    class Usuariopri extends Sistema{

        public $id_usuariopri;
        public $correo;
        public $pass;


        public function getId_usuariopri(){
            return $this->id_usuariopri;
        }

        public function setId_usuariopri($id_usuariopri){
            $this->id_usuariopri = $id_usuariopri;
            return $this;
        }

        public function getCorreo(){
            return $this->correo;
        }

        public function setCorreo($correo){
            $this->correo = $correo;
            return $this;
        }

        public function getPass(){
            return $this->pass;
        }

        public function setPass($pass){
            $this->pass = $pass;
            return $this;
        }


        public function read(){
            $this->conexion();
            $sql = "SELECT id_usuariopri, 
                     correo, 
                     pass
                     FROM usuariopri;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosUsuariopris = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosUsuariopris; 
        }

        public function readOne($id_usuariopri){
            $this->conexion();
            $sql = "SELECT correo, 
                        pass 
                        from usuariopri
                        WHERE usuariopri.id_usuariopri = :id_usuariopri";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
            $stmt->execute();
            $datosUsuariopri = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosUsuariopri = (isset($datosUsuariopri[0]))?$datosUsuariopri[0]:null;
            return $datosUsuariopri;
        }

        public function create($datosUsuariopri){
            $this->conexion();
            $sql = "INSERT INTO usuariopri (correo, pass) VALUES (:correo, :pass)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $datosUsuariopri['correo'], PDO::PARAM_STR);
            $datosUsuariopri['pass'] = md5($datosUsuariopri['pass']);
            $stmt -> bindParam(':pass', $datosUsuariopri['pass'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        public function update($datosUsuariopri, $id_usuariopri){
            $this->conexion();
            $sql = "UPDATE usuariopri set 
            correo = :correo,
            pass = :pass   
            WHERE id_usuariopri = :id_usuariopri";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
            $stmt -> bindParam(':correo', $datosUsuariopri['correo'], PDO::PARAM_STR);
            if(strlen($datosUsuariopri['pass'])>0){
                $datosUsuariopri['pass'] = md5($datosUsuariopri['pass']);
                $stmt -> bindParam(':pass', $datosUsuariopri['pass'], PDO::PARAM_STR);
            }
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        public function delete($id_usuariopri){
            $this->conexion();
            $sql = "DELETE FROM usuariopri WHERE id_usuariopri = :id_usuariopri";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuariopri', $id_usuariopri, PDO::PARAM_INT);
            $rs=$stmt->execute();
            return $stmt->rowCount();
        }


//////////////////////////////credenciales del usuario

        public function credentials($correo){
            $_SESSION['correo'] = $correo;
            $sql = "SELECT r.nombre_rol
            from usuariopri_rol ur
            INNER JOIN rol r on ur.id_rol= r.id_rol 
            INNER JOIN usuariopri us on ur.id_usuariopri= us.id_usuariopri 
                    where us.correo= :correo" ;
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();
            $datosUsuariopri=array();
            $_SESSION['roles']=array();
            $datosUsuariopri=$stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach($datosUsuariopri as $key => $value){
                array_push($_SESSION['roles'],$value['nombre_rol']);
            }
            //$_SESSION['validado'] = true;
        }

    }

    $usuariopri = new Usuariopri();

?>