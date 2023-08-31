<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo de Animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="https://uploads.spiritfanfiction.com/historias/capas/202110/multiverso-dos-animes--cbu-collision-between-universes-23149291-311220211615.jpg">
</head>

<style>
    body {
        background-image: url("https://lunetas.com.br/wp-content/uploads/2022/04/animes-e-criancas-portal-lunetas.jpg");
    }
</style>

<body>
    <?php

    include "conecter.php";

    $name = $_POST['nome'];
    $categ = $_POST['categ'];
    $dio = $_POST['dio'];


    $sql = "INSERT INTO `animes`(`nome`, `categoria`, `estudio`) VALUES ('$name','$categ','$dio')";

    $inserir = mysqli_query($conecter, $sql);

    ?>


    <div class="container" style="width: 300px">

        <h4 class="cadas">Cadastrado com sucesso!</h4>
        <div style="padding-top: 20px">

            <a href="inicio.php" role="button" class="btn btn-sm btn-primary">Fazer novo cadastrar</a>
            <a href="lista.php" role="button" class="btn btn-sm btn-primary">Lista de animes</a>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>