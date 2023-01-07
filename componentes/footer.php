<!-- Footer -->

<!-- Footer -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>

<!-- Script para genarar contraseñas aleatorias -->
<script type="text/javascript">
function GenerarPassAdmin() {
    $.ajax({
        url: 'GenerarPass.php',
        type: 'post',

        success: function(response) {
            $("#PassAdmin").val(response);
        }
    });
}

function GenerarPassSystem() {
    $.ajax({
        url: 'GenerarPass.php',
        type: 'post',

        success: function(response) {
            $("#PassSystem").val(response);
        }
    });
}

function GenerarPassDisco() {
    $.ajax({
        url: 'GenerarPass.php',
        type: 'post',

        success: function(response) {
            $("#PassDisco").val(response);
        }
    });
}

function GenerarPassWin() {
    $.ajax({
        url: 'GenerarPass.php',
        type: 'post',

        success: function(response) {
            $("#PassWin").val(response);
        }
    });
}
</script>
<!-- Script para genarar contraseñas aleatorias -->


<!-- Script para las tablas con paginacion -->
    <!--jQuery library file -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <!--Datatable plugin JS library file -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script>
    <script>
    /* Initialization of datatables */
    $(document).ready(function() {
        $('table.display').DataTable();
    });
    </script>
<!-- Script para las tablas con paginacion -->



<!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->


</body>

</html>