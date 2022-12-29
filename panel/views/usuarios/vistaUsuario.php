<h1> ¡Usuario! </h1>
<a href="ctrlUsuario.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Usuario</a>

<table class="table" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Usuario de red</th>
            <th scope="col">Celular</th>
            <th scope="col">Puesto</th>
            <th scope="col">UN</th>
            <th scope="col">Departamenro</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                foreach ($datosUsuarios as $key => $datosUsuario):
            ?>

            <tr>
            <td><?php echo $datosUsuario['no_empleado'] ?></td>
            <td><?php echo $datosUsuario['nombre'] ?></td>
            <td><?php echo $datosUsuario['correo'] ?></td>
            <td><?php echo $datosUsuario['usuario_red'] ?></td>
            <td><?php echo $datosUsuario['no_celular'] ?></td>
            <td><?php echo $datosUsuario['puesto'] ?></td>
            <td><?php echo $datosUsuario['un'] ?></td>
            <td><?php echo $datosUsuario['departamento'] ?></td>
            

                <td>  
                    <div>
                    <a href="ctrlUsuario.php?accion=modify&no_empleado=<?php echo $datosUsuario['no_empleado']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlUsuario.php?accion=delete&no_empleado=<?php echo $datosUsuario['no_empleado']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>