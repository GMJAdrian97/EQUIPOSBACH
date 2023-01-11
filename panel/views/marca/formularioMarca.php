<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_marca))? "Modifica a tu ": " Introduce tu nueva ";?>marca &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST"
        action="ctrlMarca.php?accion=<?php echo(isset($id_marca))? "update&id_marca=".$id_marca: "add"; ?>"
        enctype="multipart/form-data" id="contact_form">
        <div class="ST">
            <label for="ST">Marca</label>
            <input type="text" name="nombre_marca"
                value="<?php echo(isset($id_marca)) ? $datosMarca['nombre_marca']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Marca" required />
        </div>

        <div class="MO">
            <label for="MO">Modelo</label>
            <select class="custom-select" id="validatedInputGroupSelect" name="id_modelo" required>
                <option selected>Choose...</option>
                <?php foreach ($datosModelo as $key => $value): 
                                    $selected = "";
                                      if($value['nombre_modelo'] == $datosMarca['nombre_modelo']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_modelo'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre_modelo']?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
                                    </section>