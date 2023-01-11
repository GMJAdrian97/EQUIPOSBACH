<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_renovacion))? "Modifica a tu ": " Introduce tu nuevo ";?>Renovacion &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST"
        action="ctrlRenovacion.php?accion=<?php echo(isset($id_renovacion))? "update&id_renovacion=".$id_renovacion: "add"; ?>">
        <div class="Puesto">
            <label for="Puesto">Puesto</label>
            <input type="text" name="descipcion_renovacion"
                value="<?php echo(isset($id_renovacion)) ? $datosRenovacion['descipcion_renovacion']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Puesto" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
</section>