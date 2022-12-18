<?php
$caracteres = "adcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
$longitud = 10;

echo substr(str_shuffle($caracteres), 0, $longitud);
?>