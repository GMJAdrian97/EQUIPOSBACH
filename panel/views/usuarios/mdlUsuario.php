<?php
    require_once('../../sistema.php');

    class Usuario extends Sistema{
        public $no_empleado;
        public $nombre;
        public $correo;
        public $usuario_red;
        public $no_celular;
        public $id_puesto;
        public $id_un;
        public $id_departamento;

    
        public function getNo_empleado(){
            return $this->no_empleado;
        }

        public function setNo_empleado($no_empleado){
            $this->no_empleado = $no_empleado;
            return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function getCorreo(){
            return $this->correo;
        }

        public function setCorreo($correo){
             $this->correo = $correo;
            return $this;
        }

        public function getUsuario_red(){
            return $this->usuario_red;
        }

        public function setUsuario_red($usuario_red){
            $this->usuario_red = $usuario_red;
            return $this;
        }

        public function getNo_celular(){
            return $this->no_celular;
        }

        public function setNo_celular($no_celular){
            $this->no_celular = $no_celular;
            return $this;
        }

        public function getId_puesto(){
            return $this->id_puesto;
        }

        public function setId_puesto($id_puesto){
            $this->id_puesto = $id_puesto;
            return $this;
        }

        public function getId_un(){
            return $this->id_un;
        }

        public function setId_un($id_un){
            $this->id_un = $id_un;
            return $this;
        }

        public function getId_departamento(){
            return $this->id_departamento;
        }

        public function setId_departamento($id_departamento){
            $this->id_departamento = $id_departamento;
            return $this;
        }


        //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

        //////////////////////////////////////// Metodo read ////////////////////////////////////////
        public function read(){
            $this->conexion();
            $sql = "SELECT u.no_empleado,
                           u.nombre,
                           u.correo,
                           u.usuario_red,
                           u.no_celular,
                           p.nombre AS puesto,
                           un.nombre AS un,
                           d.nombreD AS departamento
                    FROM usuario u
                    INNER JOIN puesto p on p.id_puesto = u.id_puesto
                    INNER JOIN un un on un.id_un = u.id_un
                    INNER JOIN departamento d on d.id_departamento = u.id_departamento;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosUsuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            return $datosUsuarios; 
        }

        //////////////////////////////////////// Metodo read One ////////////////////////////////////////
        public function readOne($no_empleado){
            $this->conexion();
            $sql = "SELECT u.no_empleado,
                           u.nombre,
                           u.correo,
                           u.usuario_red,
                           u.no_celular,
                           p.nombre AS puesto,
                           un.nombre AS un,
                           d.nombreD AS departamento
                    FROM usuario u
                    INNER JOIN puesto p on p.id_puesto = u.id_puesto
                    INNER JOIN un un on un.id_un = u.id_un
                    INNER JOIN departamento d on d.id_departamento = u.id_departamento
                    WHERE u.no_empleado = :no_empleado;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':no_empleado', $no_empleado, PDO::PARAM_INT);
            $stmt->execute();
            $datosUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosUsuario = (isset($datosUsuario[0]))?$datosUsuario[0]:null;
            return $datosUsuario;
        }


        public function readOneCorreo($correo){
            $this->conexion();
            $sql = "SELECT u.no_empleado,
                           u.nombre,
                           u.correo,
                           u.usuario_red,
                           u.no_celular,
                           p.nombre AS puesto,
                           un.nombre AS un,
                           d.nombreD AS departamento
                    FROM usuario u
                    INNER JOIN puesto p on p.id_puesto = u.id_puesto
                    INNER JOIN un un on un.id_un = u.id_un
                    INNER JOIN departamento d on d.id_departamento = u.id_departamento
                    WHERE u.correo = :correo;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $correo, PDO::PARAM_INT);
            $stmt->execute();
            $datosUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosUsuario = (isset($datosUsuario[0]))?$datosUsuario[0]:null;
            return $datosUsuario;
        }


        //////////////////////////////////////// Metodo Create ////////////////////////////////////////
        public function create($datosUsuario){
            $this->conexion();
            $sql = "INSERT INTO usuario (no_empleado, 
                                         nombre, 
                                         correo, 
                                         usuario_red, 
                                         no_celular, 
                                         id_puesto, 
                                         id_un, 
                                         id_departamento) 
                            VALUES (:no_empleado, 
                                    :nombre, 
                                    :correo, 
                                    :usuario_red, 
                                    :no_celular, 
                                    :id_puesto, 
                                    :id_un, 
                                    :id_departamento)"; 
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':no_empleado', $datosUsuario['no_empleado'], PDO::PARAM_INT);
            $stmt -> bindParam(':nombre', $datosUsuario['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':correo', $datosUsuario['correo'], PDO::PARAM_STR);
            $stmt -> bindParam(':usuario_red', $datosUsuario['usuario_red'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_celular', $datosUsuario['no_celular'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_puesto', $datosUsuario['id_puesto'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_un', $datosUsuario['id_un'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_departamento', $datosUsuario['id_departamento'], PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        //////////////////////////////////////// Metodo Update ////////////////////////////////////////
        public function update($datosUsuario, $no_empleado){
            $this->conexion();
            $sql = "UPDATE usuario set 
                            no_empleado = :no_empleado,
                            nombre = :nombre,
                            correo = :correo,
                            usuario_red = :usuario_red,
                            no_celular = :no_celular,
                            id_puesto = :id_puesto,
                            id_un = :id_un,
                            id_departamento = :id_departamento
                    WHERE no_empleado = :no_empleado";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datosUsuario['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':correo', $datosUsuario['correo'], PDO::PARAM_STR);
            $stmt -> bindParam(':usuario_red', $datosUsuario['usuario_red'], PDO::PARAM_STR);
            $stmt -> bindParam(':no_celular', $datosUsuario['no_celular'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_puesto', $datosUsuario['id_puesto'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_un', $datosUsuario['id_un'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_departamento', $datosUsuario['id_departamento'], PDO::PARAM_INT);
            $stmt -> bindParam(':no_empleado', $no_empleado, PDO::PARAM_INT);
            $rs = $stmt -> execute();
            return $rs;
        }

        //////////////////////////////////////// Metodo Delete ////////////////////////////////////////
        public function delete($no_empleado){
            $this->conexion();
            $sql = "DELETE FROM usuario WHERE no_empleado = :no_empleado";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':no_empleado', $no_empleado, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }
    }

    //////////////////////////////////////// Metodos CRUD ////////////////////////////////////////

    $usuario = new Usuario();
?>