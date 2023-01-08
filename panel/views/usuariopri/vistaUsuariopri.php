<div class="row">
    <div class="col-1"></div>
    <div class="col">
        <br />
        <h1> ¡Usuario privilegiados! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
<thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Correo</th>
                    <th scope="col" style="text-align:center;">Contraseña</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosUsuariopris as $key => $datosUsuariopri):
            ?>

                <tr>
                    <td><?php echo $datosUsuariopri['id_usuariopri'] ?></td>
                    <td><?php echo $datosUsuariopri['correo'] ?></td>
                    <td><?php echo $datosUsuariopri['pass'] ?></td>

                    <td>
                        <div>
                            <a
                                href="ctrlUsuariopri.php?accion=modify&id_usuariopri=<?php echo $datosUsuariopri['id_usuariopri']; ?>"><button
                                    type="button" id="table_button" class="btn btn-success bi-pencil">Modificar</button></a>
                            <a
                                href="ctrlUsuariopri.php?accion=delete&id_usuariopri=<?php echo $datosUsuariopri['id_usuariopri']; ?>"><button
                                    type="button" id="table_button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                        </div>
                    </td>

                </tr>

                <?php
                endforeach;
            ?>

            </tbody>
        </table>
    </div>
    <div class="col-1"></div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col">
        <br />
        <a href="ctrlUsuariopri.php?accion=new" id="table_button" class="btn btn-primary" style="margin:30px; float: right;"> Dar privilegios a un
            usuario</a>
    </div>
    <div class="col-1"></div>
</div>