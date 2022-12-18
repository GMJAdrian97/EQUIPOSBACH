<div class="contenedor">
    <!-- <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" /> -->
    <div class="centradoEquipo">
        <div class="row">
            <div class="col">
                <!-- multiid_ticketep form -->
                <form method="POST"
                    action="ctrlTicketPC.php?accion=<?php echo(isset($id_ticket))? "update&id_ticket=".$id_ticket: "add"; ?>"
                    enctype="multipart/form-data" id="msform">
                    <!-- fieldsets -->
                    <fieldset id="fieldset">
                        <h2 class="fs-title">
                            <?php echo(isset($id_ticket))? "Modifica a tu ": " Introduce tu nevo ";?>Equipo</h2>
                        <br />
                        <div class="col-auto">
                                
                                <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Accion</label>
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



                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">ST</label>
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


                            <label class="sr-only" for="inlineFormInputGroup">contrasena_admin</label>
                            <input type="text" name="contrasena_admin" id="PassAdmin"
                                value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_admin']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="contrasena_admin" />
                                <label class="sr-only" for="inlineFormInputGroup">contrasena_system</label>
                            <input type="text" name="contrasena_system" id="PassSystem"
                                value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_system']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="contrasena_system" />
                                <label class="sr-only" for="inlineFormInputGroup">contrasena_disco</label>
                            <input type="text" name="contrasena_disco" id="PassDisco"
                                value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_disco']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="contrasena_disco" />
                            <div class="input-group is-invalid">
                            <label class="sr-only" for="inlineFormInputGroup">contrasena_Wiadmin</label>
                            <input type="text" name="contrasena_Wiadmin" id="PassWin"
                                value="<?php echo(isset($id_ticket)) ? $datosTicketPC['contrasena_Wiadmin']:"";?>"
                                class="form-control" id="inlineFormInputGroup" placeholder="contrasena_Wiadmin" />
                            <div class="input-group is-invalid">

                            <input class="btn btn-primary" type="button" name="enviar" onclick="GenerarPassAdmin(); GenerarPassSystem(); GenerarPassDisco(); GenerarPassWin();" value="Genarar pass">
                        
                            <div class="input-group is-invalid">
                                <label class="input-group-text" for="validatedInputGroupSelect">Empleado</label>
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

                            <label class="sr-only" for="inlineFormInputGroup">descripcion</label>
                            <input type="text" name="descripcion"
                                value="<?php echo(isset($id_ticket)) ? $datosTicketPC['descripcion']:"";?>"
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