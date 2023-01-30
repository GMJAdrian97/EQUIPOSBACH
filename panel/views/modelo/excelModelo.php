<?php
    require_once('mdlModelo.php');
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Modelos.xls");
    $datosModelos = $modelo->read();
?>
 <table id="containerTablas" class="display" style="text-align:center;">
        <thead>
            <tr>
            <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Modelo</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datosModelos as $key => $datosModelo):
            ?>

            <tr>
            <td><?php echo $datosModelo['id_modelo'] ?></td>
                    <td><?php echo $datosModelo['nombre_modelo'] ?></td>
            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
    </table>