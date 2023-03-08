<?php
$x = 8;
$y = 7;
$z = 5;
$z1 = 9;

$media = ($x + $y + $z + $z1) / 4;

if ($media >= 7) {
   echo "Aprovado $media";
} else if ($media < 7) {
   echo "Reprovado $media";
} else {
}
