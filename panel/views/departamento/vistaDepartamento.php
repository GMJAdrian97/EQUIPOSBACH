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
                    <i class="btn btn-success bi-pencil"><a href="ctrlDepartamento.php?accion=modify&id_departamento=<?php echo $datosDepartamento['id_departamento']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="ctrlDepartamento.php?accion=delete&id_departamento=<?php echo $datosDepartamento['id_departamento']; ?>">Eliminar</a></i>
                </div>
                </td>

            </tr>

            <?php
                endforeach;
            ?>

        </tbody> 
                </table>