<section class="page-content">
    <div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_un))? "Modifica a tu ": " Introduce tu nueva ";?>Unidad de Negocio &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST" action="ctrlUn.php?accion=<?php echo(isset($id_un))? "update&id_un=".$id_un: "add"; ?>"
        enctype="multipart/form-data" id="msform">
        <div class="Rol">
            <label for="Rol">Rol</label>
            <input type="text" name="nombre" value="<?php echo(isset($id_un)) ? $datosUn['nombre']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Rol" required />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
</section>