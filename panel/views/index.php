<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Documento sin título</title>
        <script src="js/jQuery341.js"></script>
    </head>
    <body>
        <?php
            $prueba = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);
        ?>  

        <table style="border:solid 2px #000000;">
            <tr>
                <th>Opcion</th>
            </tr>   
            <?php for ($i = 1; $i <= 18; $i++):?>
                <tr>
                    <td>
                        <select name="opcion<?php echo $i?>" class="hola" required="required">
                            <option selected="selected" disabled="disabled">Selecciona uno</option>
                            <?php foreach($prueba as $elemento):?>
                                <option><?php echo $elemento?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                </tr>        
            <?php endfor?> 
        </table>

        <script>
            $('.hola').change(function() {

                // En caso de que la opción 'Selecciona uno' esté seleccionada, retornará 'undefined',
                // De esta manera se evitará bloquear la opción 'Selecciona uno'.
                var values = $("table.hola option:selected").toArray().map((option) => {
                    var value = $(option).val();            
                    /*return value === "Selecciona uno" ? undefined : value;*/
                    return $(option).val();
                });

                $(this)
                    .siblings('select')
                    .children('option')
                    .attr("disabled", false);

                $(this)
                .siblings('select')
                    .children('option')
                    .each(function () {
                        // Busca si el valor del option actual coincide con algún valor en el array anterior
                        var disable = values.find(value => {
                            return $(this).text() === value;
                        });

                        // Deshabilita la opción si 'disable' es true
                        if (disable) {
                            $(this).attr('disabled', true).siblings();
                        }
                    });        
            });
        </script>
    </body>
</html>