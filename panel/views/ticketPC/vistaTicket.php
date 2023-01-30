<section class="page-content">
    <br />
    <h1> ¡Equipos! </h1>
    <table id="containerTablas" class="display" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col" style="text-align:center;">ID</th>
                <th scope="col" style="text-align:center;">Fecha</th>
                <th scope="col" style="text-align:center;">Accion</th>
                <th scope="col" style="text-align:center;">ST</th>
                <!-- <th scope="col" style="text-align:center;">contraseña_admin</th>
                    <th scope="col" style="text-align:center;">contraseña_system</th>
                    <th scope="col" style="text-align:center;">contraseña_disco</th>
                    <th scope="col" style="text-align:center;">contraseña_wiadmin</th> -->
                <th scope="col" style="text-align:center;"># Empleado</th>
                <th scope="col" style="text-align:center;">Descripcion</th>
                <th scope="col" style="text-align:center;">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosTicketPCs as $key => $datosTicketPC):
            ?>

            <tr>
                <td><?php echo $datosTicketPC['id_ticket'] ?></td>
                <td><?php echo $datosTicketPC['fecha'] ?></td>
                <td><?php echo $datosTicketPC['accion'] ?></td>
                <td><?php echo $datosTicketPC['st'] ?></td>
                <!-- <td><//?php echo $datosTicketPC['contrasena_admin'] ?></td>
                    <td><//?php echo $datosTicketPC['contrasena_system'] ?></td>
                    <td><//?php echo $datosTicketPC['contrasena_disco'] ?></td>
                    <td><//?php echo $datosTicketPC['contrasena_Wiadmin'] ?></td> -->
                <td><?php echo $datosTicketPC['empleado'] ?></td>
                <td><?php echo $datosTicketPC['descripcion'] ?></td>


                <td>
                    <div>
                        <a href="ctrlTicketPC.php?accion=modify&id_ticket=<?php echo $datosTicketPC['id_ticket']; ?>"><button
                                id="table_button" type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                        <a
                            href="ctrlTicketPC.php?accion=delete&id_ticket=<?php echo $datosTicketPC['id_ticket']; ?>&st=<?php echo $datosTicketPC['st']; ?>"><button
                                id="table_button" type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                        <a href="ctrlTicketPC.php?accion=modify&id_ticket=<?php echo $datosTicketPC['id_ticket']; ?>"><i
                                class="bi bi-info-circle"></i></a>

                        <a
                            href="ctrlPDF.php?accion=PDFticket&id_ticket=<?php echo $datosTicketPC['id_ticket']; ?>"><button
                                id="table_button" type="button" class="btn btn-danger bi bi-trash">Resguardo</button></a>
                    </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
    </table>
    <br />
    <a href="./excelTicketPC.php" class="btn btn-primary" id="table_button" style="margin:30px; float: right;">
        Descarga Excel</a>
    <a href="ctrlTicketPC.php?accion=new" class="btn btn-primary" id="table_button" style="margin:30px; float: right;">
        Añadir nuevo Equipos</a>
</section>