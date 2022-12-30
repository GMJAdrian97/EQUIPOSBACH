<h1> ¡Altas de Usuarios priviligiados! </h1>
<a href="crtlAlta.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Usuario</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">Usario Privilegiado</th>
            <th scope="col">Rol</th>
            <th scope="col">Password</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosUSROLs as $key => $datosUSROL):
            ?>

            <tr>
            <td><?php echo $datosUSROL['correo'] ?></td>
            <td><?php echo $datosUSROL['rol'] ?></td>
            <td><?php echo $datosUSROL['pass'] ?></td>

                <td>  
                    <div>
                    <a href="crtlAlta.php?accion=modify&id_usuariopri=<?php echo $datosUSROL['id_usuariopri']; ?>&id_rol=<?php echo $datosUSROL['id_rol']; ?>"><button type="button" class="btn btn-success bi-pencil"> Modificar</button></a>
                    <a href="crtlAlta.php?accion=delete&id_usuariopri=<?php echo $datosUSROL['id_usuariopri']; ?>&id_rol=<?php echo $datosUSROL['id_rol']; ?>"><button type="button"class="btn btn-danger bi bi-trash"> Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>