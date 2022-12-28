<h1> ¡Equipos! </h1>
<a href="ctrlEquipo.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Equipos</a>

<table class="table" >
        <thead>
            <tr>
            <th scope="col">ST</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Accesorios</th>
            <th scope="col">Tipo de equipo</th>
            <th scope="col">Precio de venta</th>
            <th scope="col">Precio de adquisicion</th>
            <th scope="col">marca</th>
            <th scope="col">modelo</th>
            <th scope="col">estado</th>
            <th scope="col">Opciones</th>
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
                    <a href="ctrlEquipo.php?accion=modify&st=<?php echo $datosEquipo['st']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlEquipo.php?accion=delete&st=<?php echo $datosEquipo['st']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>