<div class="row">
    <div class="col-1"></div>
    <div class="col">
        <br /> <h1> ¡Departamento! </h1>
        <table id="containerTablas" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Departamento</th>
                    <th scope="col" style="text-align:center;">Opciones</th>
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
                            <a
                                href="ctrlDepartamento.php?accion=modify&id_departamento=<?php echo $datosDepartamento['id_departamento']; ?>"><button
                                    type="button" id="table_button" class="btn btn-success bi-pencil">Modificar</button></a>
                            <a
                                href="ctrlDepartamento.php?accion=delete&id_departamento=<?php echo $datosDepartamento['id_departamento']; ?>"><button
                                    type="button" id="table_button" class="btn btn-danger bi bi-trash">Eliminar</button></a>
                        </div>
                    </td>

                </tr>

                <?php
                endforeach;
            ?>

            </tbody>
        </table>
    </div>
    <div class="col-1"></div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col">
        <br />
        <a href="ctrlDepartamento.php?accion=new" id="table_button" class="btn btn-primary" style="margin:30px; float: right;"> Añadir nuevo
            departamento</a>
    </div>
    <div class="col-1"></div>
</div>