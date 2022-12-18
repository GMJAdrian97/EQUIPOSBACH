<h1> ¡Renovacion! </h1>
<a href="ctrlRenovacion.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Renovacion</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Renovacion</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                foreach ($datosRenovaciones as $key => $datosRenovacion):
            ?>

            <tr>
            <td><?php echo $datosRenovacion['id_renovacion'] ?></td>
            <td><?php echo $datosRenovacion['descipcion_renovacion'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="ctrlRenovacion.php?accion=modify&id_renovacion=<?php echo $datosRenovacion['id_renovacion']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlRenovacion.php?accion=delete&id_renovacion=<?php echo $datosRenovacion['id_renovacion']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>