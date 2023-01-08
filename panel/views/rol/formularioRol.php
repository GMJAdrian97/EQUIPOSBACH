<div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_rol))? "Modifica a tu ": " Introduce tu nuevo ";?>Rol &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST" action="ctrlRol.php?accion=<?php echo(isset($id_rol))? "update&id_rol=".$id_rol: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <div class="Rol">
            <label for="Rol">Rol</label>
            <input type="text" name="nombre_rol" value="<?php echo(isset($id_rol)) ? $datosRol['nombre_rol']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Rol" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->