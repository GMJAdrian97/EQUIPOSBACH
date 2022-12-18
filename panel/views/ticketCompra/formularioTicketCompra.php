<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoEquipo">
        <div class="row">
            <div class="col">
                <!-- multiid_compraep form --> 
                <form method="POST"
                    action="ctrlTicketCompra.php?accion=<?php echo(isset($id_compra))? "update&id_compra=".$id_compra: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_compra))? "Modifica a tu ": " Introduce tu nueva ";?>compra</h2>
                        <br />
                        <div class="col-auto">

                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">ST</label>
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

                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Empleado</label>
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

                            <label class="sr-only" for="inlineFormInputGroup">descripcion</label>
                            <input type="text" name="descripcion"
                                value="<?php echo(isset($id_compra)) ? $datosTicketCompra['descripcion']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="descripcion" />
                        </div>
                        <br />
                        <br />
                        <input class="btn btn-primary" type="submit" value="Guardar" />
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>