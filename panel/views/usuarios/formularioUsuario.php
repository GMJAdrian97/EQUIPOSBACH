<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($no_empleado))? "Modifica a tu ": " Introduce tu nuevo ";?>Empleado &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST"
        action="ctrlUsuario.php?accion=<?php echo(isset($no_empleado))? "update&no_empleado=".$no_empleado: "add"; ?>   "
        enctype="multipart/form-data" id="contact_form">
        <div class="No_Empleado">
            <label for="No_Empleado">Numero empleado</label>
            <input type="number" name="no_empleado"
                value="<?php echo(isset($no_empleado)) ? $datosUsuario['no_empleado']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="No_empleado" required />
        </div>
        <div class="Empleado">
            <label for="Empleado">Nombre del empleado</label>
            <input type="text" name="nombre" value="<?php echo(isset($no_empleado)) ? $datosUsuario['nombre']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Nombre" required />
        </div>
        <div class="Correo">
            <label for="Correo">Correo Electronico</label>
            <input type="email" name="correo" value="<?php echo(isset($no_empleado)) ? $datosUsuario['correo']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Correo" required />
        </div>
        <div class="US_RED">
            <label for="US_RED">US_RED</label>
            <input type="text" name="usuario_red"
                value="<?php echo(isset($no_empleado)) ? $datosUsuario['usuario_red']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="US_RED" required />
        </div>
        <div class="Celular">
            <label for="Celular">Celular</label>
            <input type="number" name="no_celular"
                value="<?php echo(isset($no_empleado)) ? $datosUsuario['no_celular']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Celular" required />
        </div>
        <div class="Puesto">
            <label for="Puesto">Puesto</label>
            <select placeholder="Subject line" id="subject_input" name="id_puesto" required>
                <option selected>Choose...</option>
                <?php foreach ($datosPuesto as $key => $value): 
                                    $selected = "";
                                      if($value['nombre'] == $datosUsuario['puesto']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_puesto'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre']?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="UN">
            <label for="UN">Unidad negocio</label>
            <select placeholder="Subject line" id="subject_input" name="id_un" required>
                <option selected>Choose...</option>
                <?php foreach ($datosUn as $key => $value): 
                                    $selected = "";
                                      if($value['nombre'] == $datosUsuario['un']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_un'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre']?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="Departamento">
            <label for="Departamento">Departamento</label>
            <select placeholder="Subject line" id="subject_input" name="id_departamento" required>
                <option selected>Choose...</option>
                <?php foreach ($datosDepartamento as $key => $value): 
                                    $selected = "";
                                      if($value['nombreD'] == $datosUsuario['departamento']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_departamento'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombreD']?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
</section>