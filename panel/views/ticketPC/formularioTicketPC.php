<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_marca))? "Modifica a tu ": " Introduce tu nueva ";?>asignacion &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST"
        action="ctrlTicketPC.php?accion=<?php echo(isset($id_ticket))? "update&id_ticket=".$id_ticket: "add"; ?>"
        enctype="multipart/form-data" id="contact_form">
        <div class="Accion">
            <label for="Accion">Acción</label>
            <select class="cuid_ticketom-select" id="validatedInputGroupSelect" name="id_renovacion" required>
                <option selected>Choose...</option>
                <?php foreach ($datosRenovaciones as $key => $value): 
                                    $selected = "";
                                      if($value['descipcion_renovacion'] == $datosTicketPC['accion']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_renovacion'];?>" <?php echo $selected; ?>>
                    <?php echo $value['descipcion_renovacion']?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="ST2">
            <label for="ST2">ST</label>
            <select class="cuid_ticketom-select" id="validatedInputGroupSelect" name="st" required>
                <option selected>Choose...</option>
                <?php foreach ($datosEquipos as $key => $value): 
                                    $selected = "";
                                      if($value['st'] == $datosTicketPC['st']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['st'];?>" <?php echo $selected; ?>>
                    <?php echo $value['st']?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <br /><br /><br /><br /><br />
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="contrasena_admin">
                        <label id="DescripLbl" for="contrasena_admin">contrasena_admin</label>
                        <input type="text" name="contrasena_admin" id="PassAdmin"
                            value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_admin']:"";?>"
                            class="form-control" placeholder="contrasena_admin" />
                    </div>
                </div>
                <div class="col">
                    <div class="contrasena_system">
                        <label id="DescripLbl" for="contrasena_system">contrasena_system</label>
                        <input type="text" name="contrasena_system" id="PassSystem"
                            value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_system']:"";?>"
                            class="form-control" placeholder="contrasena_system" />
                    </div>
                </div>
                <div class="col">
                    <div class="contrasena_disco">
                        <label id="DescripLbl" for="contrasena_disco">contrasena_disco</label>
                        <input type="text" name="contrasena_disco" id="PassDisco"
                            value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_disco']:"";?>"
                            class="form-control" placeholder="contrasena_disco" />
                    </div>
                </div>
                <div class="col">
                    <div class="contrasena_Wiadmin">
                        <label id="DescripLbl" for="contrasena_Wiadmin">contrasena_Wiadmin</label>
                        <input type="text" name="contrasena_Wiadmin" id="PassWin"
                            value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_Wiadmin']:"";?>"
                            class="form-control" placeholder="contrasena_Wiadmin" />
                    </div>
                </div>
            </div>
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="button" id="form_button"
                onclick="GenerarPassAdmin(); GenerarPassSystem(); GenerarPassDisco(); GenerarPassWin();"
                value="Genarar pass">
        </div>
        <br />
        <div class="Empleado">
            <label for="Empleado">Empleado</label>
            <select class="cuid_ticketom-select" id="validatedInputGroupSelect" name="no_empleado" required>
                <option selected>Choose...</option>
                <?php foreach ($datosUsuarios as $key => $value): 
                                    $selected = "";
                                      if($value['nombre'] == $datosTicketPC['empleado']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['no_empleado'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre']?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="Descripcion2">
            <label id="DescripLbl" for="Descripcion2">Descripcion2</label>
            <input type="text" name="descripcion"
                value="<?php echo(isset($id_ticket)) ? $datosTicketPC['descripcion']:"";?>" class="form-control"
                placeholder="Descripcion" />
        </div>
        <br /><br /><br /><br /><br />
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
                                    </section>