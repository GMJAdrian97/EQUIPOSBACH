<?php //require_once '../../../Componentes/header.php'; ?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoR">
        <div id="presentacion" class="card text-white">
            <div class="card-body">
                <form method="post" action="crtlAlta.php?accion=<?php echo(isset($id_usuariopri))? "update&id_usuariopri=".$id_usuariopri."&id_rol=".$id_rol : "add"; ?>"> 
                    <div class="row">
                        <h3>Crea una Cuenta Fauna</h3>
                    </div>
                    <br />
                    <div class="form-row">
                        <label class="input-group-text" for="validatedInputGroupSelect">Correo</label>
                        <label><?php echo $datosUSROL['correo']?></label>
                        <!-- <div class="form-group col-md-4">
                            <label>correo</label>
                            <input name="correo" type="Text" class="form-control" id="inputEmil4" placeholder="">
                        </div> -->
                        <div class="form-group col-md-4">
                        <!-- <label>Pass</label> -->
                            <input name="id_usuariopri" type="hidden" 
                            value="<?php echo($id_usuariopri)?>"/>

                            <input name="id_rol" type="hidden" 
                            value="<?php echo($id_rol)?>"/>
                            <!-- <label>Pass</label>
                            <input name="pass" type="text" 
                            value="<?php //echo(isset($id_usuariopri)) ? $datosUsuariopri['pass']:"";?>"
                            class="form-control" id="2erapellidp" placeholder=""> -->
                        </div>
                        <label class="input-group-text" for="validatedInputGroupSelect">Rol</label>
                        <select class="custom-select" id="validatedInputGroupSelect" name="id_rol" required>
                            <option selected>Choose...</option>
                            <?php foreach ($datosRol as $key => $value): 
                                    $selected = "";
                                    if($value['nombre_rol'] == $datosUSROL['rol']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                            <option value="<?php echo $value['id_rol'];?>" <?php echo $selected; ?>>
                                <?php echo $value['nombre_rol']?> </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                </form>
            </div>
        </div>
    </div>
</div>