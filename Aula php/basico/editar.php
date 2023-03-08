<?php

$id = $_GET["id"];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
    body {
        background-image: url("https://img.freepik.com/vetores-gratis/fundo-galaxia-realista_52683-12121.jpg?w=2000");
    }

    .container {
        color: white;
    }
</style>

<body>

    <div class="container" style="margin-top:40px">
        <form action="atualizar.php" method="post">

            <?php
            include "conecter.php";

            $sql = "SELECT * FROM `cadastro` WHERE idUser = $id";

            $buscar = mysqli_query($conecter, $sql);

            while ($array = mysqli_fetch_array($buscar)) {

                $idUser = $array['idUser'];
                $user = $array['nomeUser'];
                $endere = $array['endereco'];
                $cell = $array['telefone'];


            ?>
                <div class="container" style="margin-top: 40px">

                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $user ?>">
                        <input type="text" class="form-control" name="id" value="<?php echo $id ?>" style="display : none">
                    </div>

                    <div class="mb-3">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $endere ?>">
                    </div>


                    <div class="mb-3">
                        <label>Telefone</label>
                        <input type="number" class="form-control" name="tele" value="<?php echo $cell ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-small">Cadastrar</button>


                <?php } ?>

                </div>


                

        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>