<h1> ¡Equipos! </h1>
<a href="ctrlTicketPC.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Equipos</a>

<table class="table" >
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Accion</th>
            <th scope="col">ST</th>
            <th scope="col">contraseña_admin</th>
            <th scope="col">contraseña_system</th>
            <th scope="col">contraseña_disco</th>
            <th scope="col">contraseña_wiadmin</th>
            <th scope="col"># Empleado</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Opciones</th>
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
            <td><?php echo $datosTicketPC['contrasena_admin'] ?></td>
            <td><?php echo $datosTicketPC['contrasena_system'] ?></td>
            <td><?php echo $datosTicketPC['contrasena_disco'] ?></td>
            <td><?php echo $datosTicketPC['contrasena_Wiadmin'] ?></td>
            <td><?php echo $datosTicketPC['empleado'] ?></td>
            <td><?php echo $datosTicketPC['descripcion'] ?></td>
            

                <td>  
                    <div>
                    <a href="ctrlTicketPC.php?accion=modify&id_ticket=<?php echo $datosTicketPC['id_ticket']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlTicketPC.php?accion=delete&id_ticket=<?php echo $datosTicketPC['id_ticket']; ?>&st=<?php echo $datosTicketPC['st']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>