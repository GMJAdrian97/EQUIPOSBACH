<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlMarca.php?accion=<?php echo(isset($id_marca))? "update&id_marca=".$id_marca: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_marca))? "Modifica a tu ": " Introduce tu nevo ";?>marca</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Marca</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                                </div>
                                <input type="text" name="nombre_marca"
                                    value="<?php echo(isset($id_marca)) ? $datosMarca['nombre_marca']:"";?>"
                                    class="form-control" id="inlineFormInputGroup" placeholder="marca" />
                                <div class="input-group is-invalid">
                                    <label class="input-group-text" for="validatedInputGroupSelect">Modelo</label>
                                    <select class="custom-select" id="validatedInputGroupSelect" name="id_modelo"
                                        required>
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
                            </div>
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