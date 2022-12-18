<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoUsuario">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST"
                    action="ctrlUsuario.php?accion=<?php echo(isset($no_empleado))? "update&no_empleado=".$no_empleado: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($no_empleado))? "Modifica a tu ": " Introduce tu nevo ";?>Usuario</h2>
                        <br />
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">No. Empleado</label>
                            <input type="text" name="no_empleado"
                                value="<?php echo(isset($no_empleado)) ? $datosUsuario['no_empleado']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="no_empleado" />
                            <label class="sr-only" for="inlineFormInputGroup">Nombre</label>
                            <input type="text" name="nombre"
                                value="<?php echo(isset($no_empleado)) ? $datosUsuario['nombre']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="nombre" />
                            <label class="sr-only" for="inlineFormInputGroup">Correo</label>
                            <input type="text" name="correo"
                                value="<?php echo(isset($no_empleado)) ? $datosUsuario['correo']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="correo" />
                            <label class="sr-only" for="inlineFormInputGroup">Usuario de red</label>
                            <input type="text" name="usuario_red"
                                value="<?php echo(isset($no_empleado)) ? $datosUsuario['usuario_red']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="Usuario de red" />
                            <label class="sr-only" for="inlineFormInputGroup">Celular</label>
                            <input type="text" name="no_celular"
                                value="<?php echo(isset($no_empleado)) ? $datosUsuario['no_celular']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="celular" />
                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Puesto</label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_puesto" required>
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
                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Unidad negocio</label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_un" required>
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
                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Departamento</label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_departamento" required>
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