<?php

include "conectar.php";

$nomedese = $_POST['nome'];
$tipodese = $_POST['tipo'];
$temporadese = $_POST['temporada'];


$sql = "INSERT INTO `desenho`(`nomedese`, `tipodese`, `temporadese`) 
VALUES ('$nomedese','$tipodese','$temporadese')";

$inserir = mysqli_query($conectar, $sql);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="container" style="width: 300px">

    <h4 class="cadas">Cadastrado com sucesso!</h4>

    <div style="padding-top: 20px">

        <a href="inicio.php" role="button" class="btn btn-sm btn-primary">Novo cadastro</a>
        <a href="listarcada.php" role="button" class="btn btn-sm btn-primary">lista</a>
    </div>

</div>

<style>
    body{
        background-image: url("https://cdn.falauniversidades.com.br/wp-content/uploads/2020/04/09171720/animes-netflix.jpg");
    }
    .cadas {
        color: black;
    }
</style>