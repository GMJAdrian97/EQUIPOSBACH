<section class="page-content">
        <br />
        <h1> ¡Un! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Un</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosUns as $key => $datosUn):
            ?>

                <tr>
                    <td><?php echo $datosUn['id_un'] ?></td>
                    <td><?php echo $datosUn['nombre'] ?></td>

                    <td>
                        <div>
                            <a href="ctrlUn.php?accion=modify&id_un=<?php echo $datosUn['id_un']; ?>"><button
                            id="table_button" type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                            <a href="ctrlUn.php?accion=delete&id_un=<?php echo $datosUn['id_un']; ?>"><button
                            id="table_button" type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                        </div>
                    </td>

                </tr>

                <?php
                endforeach;
            ?>

            </tbody>
        </table>
        <br />
        <a href="ctrlUn.php?accion=new" id="table_button" class="btn btn-primary" style="margin:30px; float: right;"> Añadir nuevo Un</a>
            </section>