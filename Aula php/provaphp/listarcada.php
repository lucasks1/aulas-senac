<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body {
        background-image: url("https://im.ziffdavisinternational.com/ign_br/screenshot/default/onepiece_rjkm.jpg")

    }
    #edi {
        background-color: yellow;
    }

    #exc {
        background-color: red;
        color: black;
    }

   

    .info {
        color: black;
      text-align: center;
      
    }
</style>

<body>
    <div class="container" style="margin-top: 40px">
        <h3 class="info">Lista de Informações</h3>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">tipo</th>
                    <th scope="col">temporada</th>

                    
                </tr>
            </thead>

            <tr>
                <?php
                include "conectar.php";
                $sql = "SELECT * FROM `desenho`";
                $busca = mysqli_query($conectar, $sql);

                while ($array = mysqli_fetch_array($busca)) {
                    $idDesenho = $array['idDesenho'];
                    $nomedese = $array['nomedese'];
                    $tipodese = $array['tipodese'];
                    $temporadese = $array['temporadese'];








                ?>

                    <td> <?php echo $idDesenho; ?></td>

                    <td> <?php echo $nomedese; ?></td>

                    <td> <?php echo $tipodese; ?></td>

                    <td><a id="edi" class="btn btn-warnng" href="editar.php?id=<?php echo $idDesenho ?>" role="button">Editar</a>
                        <a id="exc" class="btn btn-warnng" href="deletar.php?id=<?php echo $idDesenho ?>" role="button">Excluir</a>
                    </td>
            </tr>


        <?php } ?>





        </table>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>