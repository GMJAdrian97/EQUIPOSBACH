<section class="page-content">
  
            <h1> ¡Usuario! </h1>
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
                        <th scope="col" style="text-align:center;">Opciones</th>
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
                                <a
                                    href="ctrlUsuario.php?accion=modify&no_empleado=<?php echo $datosUsuario['no_empleado']; ?>"><button
                                        id="table_button2" type="button"
                                        class="btn btn-success bi-pencil">Editar</button></a>
                                <a
                                    href="ctrlUsuario.php?accion=delete&no_empleado=<?php echo $datosUsuario['no_empleado']; ?>"><button
                                        id="table_button2" type="button"
                                        class="btn btn-danger bi bi-trash">Borrar</button></a>
                            </div>
                        </td>

                    </tr>

                    <?php
                endforeach;
            ?>

                </tbody>
            </table>
            <br />
            <a href="ctrlUsuario.php?accion=new" id="table_button" class="btn btn-primary" style="float: right;"> Añadir
                nuevo Usuario</a>

</section>