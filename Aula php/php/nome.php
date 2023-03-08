<?php
$usuario = $_GET['confirmar'];

switch ($usuario) {

    case "pedro":
        echo "Pedro, o esquenta bando da celeção brasileira";
        break;

    case "lucas":
        echo "O cara mais lindo";
        break;

    case "gabigol":
        echo "Não foi convocado";
        break;

        case "gabriel":
        echo "tripa seca";
        break;

        case "jão":
        echo "Digite algo filho da mãe";
        break;

       default;
       echo "Nada encontrado";
}