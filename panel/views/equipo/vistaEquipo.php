<div class="row">
    <div class="col-1"></div>
    <div class="col">
        <br />
        <h1> ¡Equipos! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">ST</th>
                    <th scope="col" style="text-align:center;">Nombre</th>
                    <th scope="col" style="text-align:center;">Descripcion</th>
                    <th scope="col" style="text-align:center;">Accesorios</th>
                    <th scope="col" style="text-align:center;">Tipo de equipo</th>
                    <th scope="col" style="text-align:center;">Precio de venta</th>
                    <th scope="col" style="text-align:center;">Precio de adquisicion</th>
                    <th scope="col" style="text-align:center;">marca</th>
                    <th scope="col" style="text-align:center;">modelo</th>
                    <th scope="col" style="text-align:center;">estado</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($datosEquipos as $key => $datosEquipo):
            ?>

                <tr>
                    <td><?php echo $datosEquipo['st'] ?></td>
                    <td><?php echo $datosEquipo['nombre_pc'] ?></td>
                    <td><?php echo $datosEquipo['descripcion'] ?></td>
                    <td><?php echo $datosEquipo['accesorios'] ?></td>
                    <td><?php echo $datosEquipo['tipo_equipo'] ?></td>
                    <td><?php echo $datosEquipo['precio_venta'] ?></td>
                    <td><?php echo $datosEquipo['precio_adquisicion'] ?></td>
                    <td><?php echo $datosEquipo['marca'] ?></td>
                    <td><?php echo $datosEquipo['modelo'] ?></td>
                    <td><?php echo $datosEquipo['estado'] ?></td>


                    <td>
                        <div>
                            <a href="ctrlEquipo.php?accion=modify&st=<?php echo $datosEquipo['st']; ?>"><button
                                    type="button" id="table_button"
                                    class="btn btn-success bi-pencil">Modificar</button></a>
                            <a href="ctrlEquipo.php?accion=delete&st=<?php echo $datosEquipo['st']; ?>"><button
                                    type="button" id="table_button"
                                    class="btn btn-danger bi bi-trash">Eliminar</button></a>
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
        <a href="ctrlEquipo.php?accion=new" id="table_button" class="btn btn-primary" style="margin:30px"> Añadir nuevo
            Equipos</a>
    </div>
    <div class="col-1"></div>
</div>