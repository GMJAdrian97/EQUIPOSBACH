equipos_pc 3Qu1P052022

CREATE TABLE renovacion(id_renovacion int PRIMARY KEY AUTO_INCREMENT,
                       descipcion_renovacion varchar(100));
              
CREATE TABLE puesto(id_puesto int AUTO_INCREMENT not null PRIMARY key,
                   nombre varchar(50));
                   
CREATE TABLE departamento(id_departamento int AUTO_INCREMENT not null PRIMARY key,
                          nombreD varchar(50));
                   
CREATE TABLE un(id_un int AUTO_INCREMENT not null PRIMARY key,
                nombre varchar(50));

CREATE TABLE modelo(id_modelo int PRIMARY KEY not null AUTO_INCREMENT,
                  nombre_modelo varchar(20));  

CREATE TABLE rol(id_rol int PRIMARY KEY not null AUTO_INCREMENT,
                  nombre_rol varchar(20));
              
CREATE TABLE usuarioPri(id_usuariopri int PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        correo varchar (100),
                        pass varchar (32),
                        token varchar(16));

CREATE TABLE marca(id_marca int PRIMARY KEY not null AUTO_INCREMENT,
                  nombre_marca varchar(20),
                  id_modelo int,
                  CONSTRAINT fk_id_modelo FOREIGN KEY (id_modelo) REFERENCES modelo(id_modelo));

CREATE TABLE equipo(st varchar (15) PRIMARY KEY not null,
                   nombre_pc varchar(100),
                   descripcion varchar(200),
                   accesorios varchar(100),
                   tipo_equipo varchar(15),
                   precio_venta double,
                   precio_adquisicion double,
                   id_marca INT,
                   modelo varchar(50),
                   CONSTRAINT fk_id_marca FOREIGN KEY (id_marca) REFERENCES marca(id_marca));
               

CREATE TABLE usuario(no_empleado int PRIMARY KEY not null,
                    nombre varchar(100),
                    correo varchar(100),
                    usuario_red varchar(10),
                    no_celular int,
                    id_puesto int,
                    id_un int,
                    id_departamento int,
                    CONSTRAINT fk_id_puestoU FOREIGN KEY (id_puesto) REFERENCES puesto(id_puesto),
                    CONSTRAINT fk_id_unU FOREIGN KEY (id_un) REFERENCES un(id_un),
                    CONSTRAINT fk_id_depa FOREIGN KEY (id_departamento) REFERENCES departamento(id_departamento));       
                   
CREATE TABLE usuarioPri_rol(id_rol int,
                           id_usuariopri int,
                  CONSTRAINT pk_us_rol PRIMARY KEY (id_rol,id_usuariopri),
                  CONSTRAINT fk_rol FOREIGN KEY (id_rol) REFERENCES rol(id_rol),
                  CONSTRAINT fk_us FOREIGN KEY (id_usuariopri) REFERENCES usuarioPri(id_usuariopri));
        
CREATE TABLE ticket_pc(id_ticket int PRIMARY KEY  not null AUTO_INCREMENT,
                      fecha date,
                      descripcion varchar(100),
                      contraseña_admin varchar(100),
                      contraseña_system varchar(100),
                      contraseña_disco varchar(100),
                      contraseña_Wiadmin varchar(100),
                      no_empleado int,
                      st varchar (15),
                      id_renovacion int,
                   	  CONSTRAINT fk_no_empleado FOREIGN KEY (no_empleado) REFERENCES usuario(no_empleado),
                      CONSTRAINT fk_sd FOREIGN KEY (st) REFERENCES equipo(st),
                      CONSTRAINT fk_id_renovacion FOREIGN KEY (id_renovacion) REFERENCES renovacion(id_renovacion));
                      
  CREATE TABLE ticket_compra(id_compra int PRIMARY KEY AUTO_INCREMENT not null,
                          fecha date,
                          descripcion varchar(100), 
                          no_empleado int,
                          st varchar (15),
                          CONSTRAINT fk_no_empleado2 FOREIGN KEY (no_empleado) REFERENCES usuario(no_empleado),
                          CONSTRAINT fk_sd2 FOREIGN KEY (st) REFERENCES equipo(st)); 

/* Crear una tabla que se llame US_previlegiados y esa sera l que se enlace con rol y us_rol */