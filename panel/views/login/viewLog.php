<section class="page-content">
<div id="containerFormularios">
    <h1>&bull; <?php echo(isset($st))? "Modifica a tu ": " Introduce tu nuevo ";?>Equipo &bull;</h1>
    <div class="underline">
    </div>
    <form method="POST" action="ctrlEquipo.php?accion=<?php echo(isset($st))? "update&st=".$st: "add"; ?>"
        enctype="multipart/form-data" id="contact_form">
        <div class="ST">
            <label for="ST">Service Tag</label>
            <input type="text" name="st" value="<?php echo(isset($st)) ? $datosEquipo['st']:"";?>" class="form-control"
                id="inlineFormInputGroup" placeholder="Service Tag (ST)" required />
        </div>
        <br/><br/><br/><br/><br/>
        <div class="descripcion">
            <label id="DescripLbl" for="descripcion">Descripcion</label>    
            <input type="text" name="descripcion"
                value="<?php echo(isset($st)) ? $datosEquipo['descripcion']:"";?>" class="form-control" cols="30" rows="5"
                id="textarea" placeholder="descripcion" />
        </div>
        <div class="submit" style="text-aling: center;">
            <input type="submit" value="Registrar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->
</section>