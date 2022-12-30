<h1> ¡Usuario privilegiados! </h1>
<a href="ctrlUsuariopri.php?accion=new" class="btn btn-primary" style="margin:30px"> Dar privilegios u un usuario</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Correo</th>
            <th scope="col">Contraseña</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
                foreach ($datosUsuariopris as $key => $datosUsuariopri):
            ?>

            <tr>
            <td><?php echo $datosUsuariopri['id_usuariopri'] ?></td>
            <td><?php echo $datosUsuariopri['correo'] ?></td>
            <td><?php echo $datosUsuariopri['pass'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlUsuariopri.php?accion=modify&id_usuariopri=<?php echo $datosUsuariopri['id_usuariopri']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlUsuariopri.php?accion=delete&id_usuariopri=<?php echo $datosUsuariopri['id_usuariopri']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>