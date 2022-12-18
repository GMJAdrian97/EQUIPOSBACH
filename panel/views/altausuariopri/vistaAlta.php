<h1> ¡Altas de Usuario! </h1>
<a href="crtlAlta.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Usuario</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">Usario Privilegiado</th>
            <th scope="col">Rol</th>
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

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="crtlAlta.php?accion=modify&id_usuariopri=<?php echo $datosUSROL['id_usuariopri']; ?>&id_rol=<?php echo $datosUSROL['id_rol']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="crtlAlta.php?accion=delete&id_usuariopri=<?php echo $datosUSROL['id_usuariopri']; ?>&id_rol=<?php echo $datosUSROL['id_rol']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>