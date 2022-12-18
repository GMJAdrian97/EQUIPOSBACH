<h1> Compras! </h1>
<a href="ctrlTicketCompra.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Equipos</a>

<table class="table" >
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Empleado</th>
            <th scope="col">ST</th>
            <th scope="col">Opciones</th>
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
                    <i class="btn btn-success bi-pencil"><a href="ctrlTicketCompra.php?accion=modify&id_compra=<?php echo $datosTicketCompra['id_compra']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlTicketCompra.php?accion=delete&id_compra=<?php echo $datosTicketCompra['id_compra']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>