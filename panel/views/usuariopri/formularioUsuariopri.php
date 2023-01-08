<div id="containerFormularios">
    <h1>&bull; <?php echo(isset($id_usuariopri))? "Modifica a tu ": " Introduce tu nuevo ";?>Usuario privilegiado &bull;
    </h1>
    <div class="underline">
    </div>
    <form method="POST"
        action="ctrlUsuariopri.php?accion=<?php echo(isset($id_usuariopri))? "update&id_usuariopri=".$id_usuariopri: "add"; ?>">
        <div class="Correo">
            <label for="Correo">Correo</label>
            <input type="text" name="correo"
                value="<?php echo(isset($id_usuariopri)) ? $datosUsuariopri['correo']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Correo" required />
        </div>
        <div class="Pass2">
            <label for="Pass2">Pass</label>
            <input type="password" name="pass" value="<?php echo(isset($id_usuariopri)) ? $datosUsuariopri['pass']:"";?>"
                class="form-control" id="inlineFormInputGroup" placeholder="Pass" required />
        </div>
        <br/><br/><br/><br/><br/>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->