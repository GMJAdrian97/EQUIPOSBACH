<h1> ¡Puesto! </h1>
<a href="ctrlPuesto.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo puesto</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Puesto</th>
            <th scope="col">Opciones</th>
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
                    <a href="ctrlPuesto.php?accion=modify&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlPuesto.php?accion=delete&id_puesto=<?php echo $datosPuesto['id_puesto']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>