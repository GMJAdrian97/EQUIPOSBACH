<h1> ¡Un! </h1>
<a href="ctrlUn.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Un</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Un</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                foreach ($datosUns as $key => $datosUn):
            ?>

            <tr>
            <td><?php echo $datosUn['id_un'] ?></td>
            <td><?php echo $datosUn['nombre'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlUn.php?accion=modify&id_un=<?php echo $datosUn['id_un']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlUn.php?accion=delete&id_un=<?php echo $datosUn['id_un']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>