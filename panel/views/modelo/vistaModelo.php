<div class="row">
    <div class="col-1"></div>
    <div class="col">
        <br />
        <h1> ¡Modelo! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Modelo</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosModelos as $key => $datosModelo):
            ?>

                <tr>
                    <td><?php echo $datosModelo['id_modelo'] ?></td>
                    <td><?php echo $datosModelo['nombre_modelo'] ?></td>

                    <td>
                        <div>
                            <a href="ctrlModelo.php?accion=modify&id_modelo=<?php echo $datosModelo['id_modelo']; ?>"><button
                                    type="button" id="table_button" class="btn btn-success bi-pencil">Modificar</button> </a>
                            <a href="ctrlModelo.php?accion=delete&id_modelo=<?php echo $datosModelo['id_modelo']; ?>">
                                <button type="button" id="table_button" class="btn btn-danger bi bi-trash">
                                    Eliminar
                                </button> </a>
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
        <a href="ctrlModelo.php?accion=new" id="table_button" class="btn btn-primary" style="margin:30px"> Añadir nuevo modelo</a>
    </div>
    <div class="col-1"></div>
</div>