<?php
    require_once('mdlMarca.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Marca.xls");
    $datosMarcas = $marca->read();
?>
 <table id="containerTablas" class="display" style="text-align:center;">
        <thead>
            <tr>
            <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Marca</th>
                    <th scope="col" style="text-align:center;">Modelo</th>
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
            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
    </table>