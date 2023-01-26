<?php
    require_once('mdlTicketPC.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=archivo.xls");
    $datosTicketPCs = $ticket_pc->read();
?>
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
            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
    </table>