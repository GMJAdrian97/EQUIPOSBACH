<?php
    require_once('mdlUsuario.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Usuarios.xls");
    $datosUsuarios = $usuario->read();
?>
 <table id="containerTablas" class="display" style="text-align:center;">
        <thead>
            <tr>
            <th scope="col" style="text-align:center;">#</th>
                        <th scope="col" style="text-align:center;">Nombre</th>
                        <th scope="col" style="text-align:center;">Correo</th>
                        <th scope="col" style="text-align:center;">Usuario de red</th>
                        <th scope="col" style="text-align:center;">Celular</th>
                        <th scope="col" style="text-align:center;">Puesto</th>
                        <th scope="col" style="text-align:center;">UN</th>
                        <th scope="col" style="text-align:center;">Departamenro</th>
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
            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
    </table>