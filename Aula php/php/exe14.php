<?php
$x = "dobro";
$n = 5;
$dobro = $n * 2;
$meta = $n / 2;
$suss = $n + 1;
$ant = $n - 1;

switch ($x) {
    case "dobro":
        echo "dobro $dobro";
        break;

    case "metade":
        echo "Metade $meta";
        break;

    case "sussessor":
        echo "sussessor $suss";
        break;

    case "antessessor":
        echo "antessessor $ant";
        break;
}
