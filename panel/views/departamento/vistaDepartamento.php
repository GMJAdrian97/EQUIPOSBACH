<h1> ¡Departamento! </h1>
<a href="ctrlDepartamento.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo departamento</a>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Departamento</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosDepartamentos as $key => $datosDepartamento):
            ?>

            <tr>
            <td><?php echo $datosDepartamento['id_departamento'] ?></td>
            <td><?php echo $datosDepartamento['nombreD'] ?></td>

                <td>  
                    <div>
                    <a href="ctrlDepartamento.php?accion=modify&id_departamento=<?php echo $datosDepartamento['id_departamento']; ?>"><button type="button" class="btn btn-success bi-pencil">Modificar</button></a>
                    <a href="ctrlDepartamento.php?accion=delete&id_departamento=<?php echo $datosDepartamento['id_departamento']; ?>"><button type="button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>