<h1> ¡marca! </h1>
<a href="ctrlMarca.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo marca</a>

<table class="table" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                foreach ($datosMarcas as $key => $datosMarca):
            ?>

            <tr>
            <td><?php echo $datosMarca['id_marca'] ?></td>
            <td><?php echo $datosMarca['nombre_marca'] ?></td>
            <td><?php echo $datosMarca['nombre_modelo'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlMarca.php?accion=modify&id_marca=<?php echo $datosMarca['id_marca']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlMarca.php?accion=delete&id_marca=<?php echo $datosMarca['id_marca']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>