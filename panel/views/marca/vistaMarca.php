<section class="page-content">
        <br />
        <h1> ¡marca! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Marca</th>
                    <th scope="col" style="text-align:center;">Modelo</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosMarcas as $key => $datosMarca):
            ?>

                <tr>
                    <td><?php echo $datosMarca['id_marca'] ?></td>
                    <td><?php echo $datosMarca['nombre_marca'] ?></td>
                    <td><?php echo $datosMarca['nombre_modelo'] ?></td>

                    <td>
                        <div>
                            <a href="ctrlMarca.php?accion=modify&id_marca=<?php echo $datosMarca['id_marca']; ?>"><button
                                    id="table_button" type="button" class="btn btn-success bi-pencil">
                                    Modificar</button></a>
                            <a href="ctrlMarca.php?accion=delete&id_marca=<?php echo $datosMarca['id_marca']; ?>"><button
                                    id="table_button" type="button" class="btn btn-danger bi bi-trash">
                                    Eliminar</button></a>
                        </div>
                    </td>

                </tr>

                <?php
                endforeach;
            ?>

            </tbody>
        </table>
        <br />
        <a href="./excelMarca.php" class="btn btn-primary" id="table_button" style="margin-left:10px; float: right;">
        Descarga Excel</a>
        <a href="ctrlMarca.php?accion=new" id="table_button" class="btn btn-primary" style="float: right;"> Añadir nuevo
            marca</a>
            </section>