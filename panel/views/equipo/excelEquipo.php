<?php
    require_once('mdlEquipo.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Equipos.xls");
    $datosEquipos = $equipo->read();
?>
 <table id="containerTablas" class="display" style="text-align:center;">
        <thead>
            <tr>
                <th scope="col" style="text-align:center;">ID</th>
                <th scope="col" style="text-align:center;">Nombre</th>
                <th scope="col" style="text-align:center;">Descripcion</th>
                <th scope="col" style="text-align:center;">Accesorios</th>
                <th scope="col" style="text-align:center;">Tipo de equipo</th>
                <th scope="col" style="text-align:center;">Previo/V</th>
                <th scope="col" style="text-align:center;">Previo/A</th>
                <th scope="col" style="text-align:center;">Marca</th>
                <th scope="col" style="text-align:center;">Modelo</th>
                <th scope="col" style="text-align:center;">Estado</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosEquipos as $key => $datosEquipo):
            ?>

            <tr>
                <td><?php echo $datosEquipo['st'] ?></td>
                    <td><?php echo $datosEquipo['nombre_pc'] ?></td>
                    <td><?php echo $datosEquipo['descripcion'] ?></td>
                    <td><?php echo $datosEquipo['accesorios'] ?></td>
                    <td><?php echo $datosEquipo['tipo_equipo'] ?></td>
                    <td><?php echo $datosEquipo['precio_venta'] ?></td>
                    <td><?php echo $datosEquipo['precio_adquisicion'] ?></td>
                    <td><?php echo $datosEquipo['marca'] ?></td>
                    <td><?php echo $datosEquipo['modelo'] ?></td>
                    <td><?php echo $datosEquipo['estado'] ?></td>
            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
    </table>