<div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_puesto))? "Modifica a tu ": " Introduce tu nuevo ";?>Puesto &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST"
    action="ctrlPuesto.php?accion=<?php echo(isset($id_puesto))? "update&id_puesto=".$id_puesto: "add"; ?>">
        <div class="Puesto">
            <label for="Puesto">Puesto</label>
            <input type="text" name="nombre"
                                    value="<?php echo(isset($id_puesto)) ? $datosPuesto['nombre']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Puesto" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->