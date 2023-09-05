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
        background-image: url("https://www.itl.cat/pngfile/big/30-300246_kimi-no-nawa-wallpaper-hd-group-34-name.jpg");
    }

    .container {
        color: white;
    }
</style>

<body>

    <div class="container" style="margin-top:40px">
        <form action="atualizar.php" method="post">

            <?php
            include "conectar.php";

            $sql = "SELECT * FROM `desenho` WHERE idDesenho = $id";

            $buscar = mysqli_query($conectar, $sql);

            while ($array = mysqli_fetch_array($buscar)) {

                $idDesenho = $array['idDesenho'];
                $nomedese = $array['nomedese'];
                $tipodese = $array['tipodese'];
                $temporadese = $array['temporadese'];


            ?>
                <div class="container" style="margin-top: 40px">

                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $nomedese ?>">
                        <input type="text" class="form-control" name="id" value="<?php echo $idDesenho ?>" style="display : none">
                    </div>

                    <div class="mb-3">
                        <label>Tipo</label>
                        <input type="text" class="form-control" name="tipo" value="<?php echo $tipodese ?>">
                    </div>


                    <div class="mb-3">
                        <label>Temporada</label>
                        <input type="number" class="form-control" name="temporada" value="<?php echo $temporadese ?>">
                    </div>

                    <button type="submit" class="btn btn-primary btn-small">Atualizar</button>


                <?php } ?>

                </div>


                

        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>