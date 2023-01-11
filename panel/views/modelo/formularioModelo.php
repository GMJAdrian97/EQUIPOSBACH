<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_modelo))? "Modifica a tu ": " Introduce tu nuevo ";?>Modelo &bull;</h1>
    <div class="underline">
    </div>
    <div class="icon_wrapper">
    </div>
    <form method="POST"
    action="ctrlModelo.php?accion=<?php echo(isset($id_modelo))? "update&id_modelo=".$id_modelo: "add"; ?>">
        <div class="Departamento">
            <label for="Departamento">Modelo</label>
            <input type="text" name="nombre_modelo"
                                    value="<?php echo(isset($id_modelo)) ? $datosModelo['nombre_modelo']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Modelo" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
</section>