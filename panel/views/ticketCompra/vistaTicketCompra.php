<section class="page-content">
        <br />
        <h1> Compras! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">>
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">ID</th>
                    <th scope="col" style="text-align:center;">Fecha</th>
                    <th scope="col" style="text-align:center;">Descripcion</th>
                    <th scope="col" style="text-align:center;">Empleado</th>
                    <th scope="col" style="text-align:center;">ST</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
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
                    <td>
                        <div>
                            <a
                                href="ctrlTicketCompra.php?accion=modify&id_compra=<?php echo $datosTicketCompra['id_compra']; ?>"><button
                                id="table_button" type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                            <a
                                href="ctrlTicketCompra.php?accion=delete&id_compra=<?php echo $datosTicketCompra['id_compra']; ?>"><button
                                id="table_button"  type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                        </div>
                    </td>

                </tr>

                <?php
                endforeach;
            ?>

            </tbody>
        </table>

        <br />
        <a href="./excelVenta.php" class="btn btn-primary" id="table_button" style="margin-left:10px; float: right;">
        Descarga Excel</a>
        <a id="table_button" href="ctrlTicketCompra.php?accion=new" class="btn btn-primary" style="float: right;"> Añadir nuevo Equipos</a>
            </section>