<?php
    require_once('mdlTicketCompra.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Ventas.xls");
    $datosTicketCompras = $ticket_compra->read();
?>
 <table id="containerTablas" class="display" style="text-align:center;">
        <thead>
            <tr>
            <th scope="col" style="text-align:center;">ID</th>
                    <th scope="col" style="text-align:center;">Fecha</th>
                    <th scope="col" style="text-align:center;">Descripcion</th>
                    <th scope="col" style="text-align:center;">Empleado</th>
                    <th scope="col" style="text-align:center;">ST</th>
                    <th scope="col" style="text-align:center;">Modelo</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosTicketCompras as $key => $datosTicketCompra):
            ?>

            <tr>
            <td><?php echo $datosTicketCompra['id_compra'] ?></td>
                    <td><?php echo $datosTicketCompra['fecha'] ?></td>
                    <td><?php echo $datosTicketCompra['descripcion'] ?></td>
                    <td><?php echo $datosTicketCompra['empleado'] ?></td>
                    <td><?php echo $datosTicketCompra['st'] ?></td>
            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
    </table>