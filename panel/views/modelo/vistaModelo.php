<h1> ¡Modelo! </h1>
<a href="ctrlModelo.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo modelo</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Modelo</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>

        <?php
                foreach ($datosModelos as $key => $datosModelo):
            ?>

        <tr>
            <td><?php echo $datosModelo['id_modelo'] ?></td>
            <td><?php echo $datosModelo['nombre_modelo'] ?></td>

            <td>
                <div>
                    <a href="ctrlModelo.php?accion=modify&id_modelo=<?php echo $datosModelo['id_modelo']; ?>"><button
                            type="button" class="btn btn-success bi-pencil">Modificar</button> </a>
                    <a href="ctrlModelo.php?accion=delete&id_modelo=<?php echo $datosModelo['id_modelo']; ?>"> <button
                            type="button" class="btn btn-danger bi bi-trash">
                            Eliminar
                        </button> </a>
                </div>
            </td>

        </tr>

        <?php
                endforeach;
            ?>

    </tbody>
</table>