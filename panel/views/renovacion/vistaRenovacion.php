<div class="row">
    <div class="col-1"></div>
    <div class="col">
        <br />
        <h1> ¡Renovacion! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Renovacion</th>
                    <th scope="col"style="text-align:center;" >Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosRenovaciones as $key => $datosRenovacion):
            ?>

                <tr>
                    <td><?php echo $datosRenovacion['id_renovacion'] ?></td>
                    <td><?php echo $datosRenovacion['descipcion_renovacion'] ?></td>

                    <td>
                        <div>
                            <a
                                href="ctrlRenovacion.php?accion=modify&id_renovacion=<?php echo $datosRenovacion['id_renovacion']; ?>"><button
                                    type="button" id="table_button" class="btn btn-success bi-pencil">Modificar</button></a>
                            <a
                                href="ctrlRenovacion.php?accion=delete&id_renovacion=<?php echo $datosRenovacion['id_renovacion']; ?>"><button
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
        <a href="ctrlRenovacion.php?accion=new" id="table_button" class="btn btn-primary" style="margin:30px; float: right;"> Añadir nuevo Renovacion</a>
    </div>
    <div class="col-1"></div>
</div>