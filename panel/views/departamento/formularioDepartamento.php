<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_departamento))? "Modifica a tu ": " Introduce tu nuevo ";?>Departamento &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST"
        action="ctrlDepartamento.php?accion=<?php echo(isset($id_departamento))? "update&id_departamento=".$id_departamento: "add"; ?>">
        <div class="Departamento">
            <label for="Departamento">Departamento</label>
            <input type="text" name="nombreD"
                value="<?php echo(isset($id_departamento)) ? $datosDepartamento['nombreD']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Departamento" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
</section>