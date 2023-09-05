<?php



include "conectar.php";




$idDesenho = $_POST['id'];
$nomedese = $_POST['nome'];
$tipodese = $_POST['tipo'];
$temporadese = $_POST['temporada'];


$sql = "UPDATE `desenho` SET `nomedese`='$nomedese',`tipodese`='$tipodese',`temporadese`='$temporadese' WHERE idDesenho = $idDesenho";


$atualizar = mysqli_query($conectar, $sql);

?>

<div class="atu"><h1>Atualizado com sucesso!</h1></div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="container" style="width: 300px">
    <div style="padding-top: 20px">

        <a href="listarcada.php" role="button" class="btn btn-sm btn-primary">Editar Novamene</a>
    </div>

</div>

<style>
    body{
        background-image: url("https://mobimg.b-cdn.net/v3/fetch/b5/b53a644e9f640c1f5875e265bca31dc1.jpeg");
    }
    .atu{
        text-align: center;
        color: white;
    }
</style>