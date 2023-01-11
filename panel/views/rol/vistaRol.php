<section class="page-content">
    <br/><h1> ¡Roles! </h1>
    <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
            <tr>
            <th scope="col" style="text-align:center;">#</th>
            <th scope="col" style="text-align:center;">rol</th>
            <th scope="col" style="text-align:center;">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosRoles as $key => $datosRol):
            ?>

            <tr>
            <td><?php echo $datosRol['id_rol'] ?></td>
            <td><?php echo $datosRol['nombre_rol'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlRol.php?accion=modify&id_rol=<?php echo $datosRol['id_rol']; ?>"><button id="table_button" type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlRol.php?accion=delete&id_rol=<?php echo $datosRol['id_rol']; ?>"><button id="table_button" type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>
        <br />
    <a href="ctrlRol.php?accion=new" id="table_button" class="btn btn-primary" style="float: right;"> Añadir nuevo Rol</a>
            </section>

