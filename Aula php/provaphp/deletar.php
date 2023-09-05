<?php

include "conectar.php";

$id = $_GET["id"];

$sql = "DELETE FROM `desenho` WHERE idDesenho = $id";

$deletar = mysqli_query($conectar, $sql);

?>

<h1 class="dele">Deletado com sucesso</h1>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="container" style="width: 300px">
    <div style="padding-top: 20px">

        <a href="listarcada.php" role="button" class="btn btn-sm btn-primary">Excluir Novamente</a>
    </div>


<style>
    body{
        background-image: url("http://media.guiame.com.br/archives/2022/12/06/4164798246-universo.jpg");
    }
    .dele{
        color: white;
        text-align: center;
    }
</style>