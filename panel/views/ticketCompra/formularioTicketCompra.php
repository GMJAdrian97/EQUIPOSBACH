<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_marca))? "Modifica a tu ": " Introduce tu nueva ";?>marca &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST"
        action="ctrlTicketCompra.php?accion=<?php echo(isset($id_compra))? "update&id_compra=".$id_compra: "add"; ?>"
        enctype="multipart/form-data" id="contact_form">
        <div class="ST">
            <label for="ST">ST</label>
            <select class="cuid_compraom-select" id="validatedInputGroupSelect" name="st" required>
                <option selected>Choose...</option>
                <?php foreach ($datosEquipos as $key => $value): 
                                    $selected = "";
                                      if($value['st'] == $datosTicketCompra['st']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['st'];?>" <?php echo $selected; ?>>
                    <?php echo $value['st']?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="Empleado2">
            <label for="Empleado2">Empleado</label>
            <select class="cuid_compraom-select" id="validatedInputGroupSelect" name="no_empleado" required>
                <option selected>Choose...</option>
                <?php foreach ($datosUsuarios as $key => $value): 
                                    $selected = "";
                                      if($value['nombre'] == $datosTicketCompra['empleado']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['no_empleado'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre']?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br/><br/><br/><br/><br/>
        <div class="Accesorios">
            <label for="Accesorios">Accesorios</label>
            <select class="cuid_ticketom-select" id="validatedInputGroupSelect" name="descripcion" required>
            <option selected><?php echo $datosTicketCompra['descripcion'];?></option>
                <option>Cargador</option>
                <option>Cargador, Mochila</option>
                <option>Cargador, Mochila, Candado</option>
            </select>
        </div>

        <br /><br /><br /><br /><br />
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
                                    </section>