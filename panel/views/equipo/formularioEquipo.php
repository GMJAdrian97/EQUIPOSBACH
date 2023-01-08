<div id="containerFormularios">
    <h1>&bull; <?php echo(isset($st))? "Modifica a tu ": " Introduce tu nuevo ";?>Equipo &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST" action="ctrlEquipo.php?accion=<?php echo(isset($st))? "update&st=".$st: "add"; ?>"
        enctype="multipart/form-data" id="contact_form">
        <div class="ST">
            <label for="ST">Service Tag</label>
            <input type="text" name="st" value="<?php echo(isset($st)) ? $datosEquipo['st']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Service Tag (ST)" required />
        </div>
        <div class="nombre">
            <label for="nombre">Nombre del equipo</label>
            <input type="text" name="nombre_pc" value="<?php echo(isset($st)) ? $datosEquipo['nombre_pc']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="nombre equipo" required />
        </div>
        <div class="accesorios">
            <label for="accesorios">Accesorios</label>
            <input type="text" name="accesorios" value="<?php echo(isset($st)) ? $datosEquipo['accesorios']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Accesorios" required />
        </div>
        <div class="TipoEquipo">
            <label for="TipoEquipo">Tipo de equipo</label>
            <input type="text" name="tipo_equipo" value="<?php echo(isset($st)) ? $datosEquipo['tipo_equipo']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Laptop" required />
        </div>
        <div class="PrecioV">
            <label for="PrecioV">Precio de venta</label>
            <input type="text" name="precio_venta" value="<?php echo(isset($st)) ? $datosEquipo['precio_venta']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="$" required />
        </div>
        <div class="PrecioA">
            <label for="PrecioA">Precio de adquisicion</label>
            <input type="text" name="precio_adquisicion"
                value="<?php echo(isset($st)) ? $datosEquipo['precio_adquisicion']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="$" required />
        </div>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <div class="subject">
        <label for="subject">Marca</label>
            <select placeholder="Subject line" id="subject_input" name="id_marca" required>
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

        <div class="MO">
            <label for="MO">Modelo</label>
            <select placeholder="Subject line" id="subject_input" name="id_modelo" required>
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

        <div class="estado">
            <label for="estado">Estado</label>
            <select placeholder="Subject line" id="subject_input" name="estado" required>
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
            </select>
        </div>
        <br/><br/><br/><br/><br/>
        <div class="descripcion">
            <label id="DescripLbl" for="descripcion">Descripcion</label>    
            <input type="text" name="descripcion"
                value="<?php echo(isset($st)) ? $datosEquipo['descripcion']:"";?>" class="form-control" cols="30" rows="5"
                id="textarea" placeholder="descripcion" />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->