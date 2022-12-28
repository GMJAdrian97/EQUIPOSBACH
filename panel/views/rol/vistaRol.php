<div class="contenedor">
   <!--  <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" /> -->
    <div class="centradoRoles">
    <h1> ¡Roles! </h1>
    <a href="ctrlRol.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo rol</a>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">rol</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosRoles as $key => $datosRol):
            ?>

            <tr>
            <td><?php echo $datosRol['id_rol'] ?></td>
            <td><?php echo $datosRol['nombre_rol'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlRol.php?accion=modify&id_rol=<?php echo $datosRol['id_rol']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlRol.php?accion=delete&id_rol=<?php echo $datosRol['id_rol']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>
            </div>
            <div class="col">
        </div>
    </div>
  </div>
</div>
</div>