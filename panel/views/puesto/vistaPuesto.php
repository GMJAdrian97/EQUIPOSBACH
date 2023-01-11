<section class="page-content">
        <br />
        <h1> ¡Puesto! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Puesto</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosPuestos as $key => $datosPuesto):
            ?>

                <tr>
                    <td><?php echo $datosPuesto['id_puesto'] ?></td>
                    <td><?php echo $datosPuesto['nombre'] ?></td>

                    <td>
                        <div>
                            <a href="ctrlPuesto.php?accion=modify&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>"><button
                                    type="button" id="table_button" class="btn btn-success bi-pencil">Modificar</button></a>
                            <a href="ctrlPuesto.php?accion=delete&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>"><button
                                    type="button" id="table_button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                        </div>
                    </td>

                </tr>

                <?php
                endforeach;
            ?>

            </tbody>
        </table>
 
        <br />
        <a  id="table_button"  href="ctrlPuesto.php?accion=new" class="btn btn-primary" style="margin:30px; float: right;"> Añadir nuevo puesto</a>
            </section>