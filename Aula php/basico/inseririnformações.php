<?php

include "conecter.php";

$user = $_POST['nome'];
$endere = $_POST['endereco'];
$cell = $_POST['tele'];


$sql = "INSERT INTO `cadastro`(`nomeUser`, `endereco`, `telefone`) VALUES ('$user' , '$endere' , '$cell')";

$inserir = mysqli_query($conecter, $sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="container" style="width: 300px">

    <h4 class="cadas">Cadastrado com sucesso!</h4>
    <div style="padding-top: 20px">

        <a href="inicio.php" role="button" class="btn btn-sm btn-primary">Fazer novo adastrar</a>
    </div>

</div>

<style>
    body{
        background-image: url("https://img.freepik.com/fotos-gratis/espaco-galaxia-universo-wallpaper_1017-3753.jpg?w=2000");
    }
    .cadas {
        color: white;
    }
</style>