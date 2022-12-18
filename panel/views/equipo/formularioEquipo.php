<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoEquipo">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlEquipo.php?accion=<?php echo(isset($st))? "update&st=".$st: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($st))? "Modifica a tu ": " Introduce tu nevo ";?>Equipo</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Service Tag</label>
                            <input type="text" name="st"
                                value="<?php echo(isset($st)) ? $datosEquipo['st']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="st" />
                            <label class="sr-only" for="inlineFormInputGroup">Nombre del equipo</label>
                            <input type="text" name="nombre_pc"
                                value="<?php echo(isset($st)) ? $datosEquipo['nombre_pc']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="nombre equipo" />
                            <label class="sr-only" for="inlineFormInputGroup">Descripcion</label>
                            <input type="text" name="descripcion"
                                value="<?php echo(isset($st)) ? $datosEquipo['descripcion']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="descripcion" />
                            <label class="sr-only" for="inlineFormInputGroup">Accesorios</label>
                            <input type="text" name="accesorios"
                                value="<?php echo(isset($st)) ? $datosEquipo['accesorios']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="Accesorios" />
                            <label class="sr-only" for="inlineFormInputGroup">Tipo de equipo</label>
                            <input type="text" name="tipo_equipo"
                                value="<?php echo(isset($st)) ? $datosEquipo['tipo_equipo']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="Laptop" />
                                <label class="sr-only" for="inlineFormInputGroup">Precio de venta</label>
                            <input type="text" name="precio_venta"
                                value="<?php echo(isset($st)) ? $datosEquipo['precio_venta']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="$" />
                                <label class="sr-only" for="inlineFormInputGroup">Precio de adquisicion</label>
                            <input type="text" name="precio_adquisicion"
                                value="<?php echo(isset($st)) ? $datosEquipo['precio_adquisicion']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="$" />
                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Marca</label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_marca" required>
                                    <option selected>Choose...</option>
                                    <?php foreach ($datosMarca as $key => $value): 
                                    $selected = "";
                                      if($value['nombre_marca'] == $datosEquipo['marca']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $value['id_marca'];?>" <?php echo $selected; ?>>
                                        <?php echo $value['nombre_marca']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Modelo</label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_modelo" required>
                                    <option selected>Choose...</option>
                                    <?php $estado = $datosEquipo['estado'];
                                    foreach ($datosModelo as $key => $value): 
                                    $selected = "";
                                      if($value['nombre_modelo'] == $datosEquipo['modelo']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $value['nombre_modelo'];?>" <?php echo $selected; ?>>
                                        <?php echo $value['nombre_modelo']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Estado</label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="estado" required>
                                    <option value="Disponible" selected>Disponible</option>
                                    <option value="Ocupado">Ocupado</option>
	                                <option value="Repacion">Repacion</option>
	                                <option value="Perdida">Perdida</option>
                                    <?php $selected = "";
                                      if($estado == $datosEquipo['estado']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                  <option value="<?php echo $estado;?>" <?php echo $selected; ?>>
                                        <?php echo $estado?> </option>
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