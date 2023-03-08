<?php
$numero = $_GET ['go'];

if ($numero>=10) {
    echo "Numero de mais de 1 digito";
}
else {
    echo "Numero de um digito";
}