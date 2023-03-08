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
        background-image: url("https://img.wallpapic-br.com/i2431-547-721/medium/espaco-lua-claro-universo-imagem-de-fundo.jpg");
    }

    #edi {
        background-color: greenyellow;
    }

    #exc {
        background-color: blue;
        color: white;
    }

    .table {
        color: white;
    }

    .info {
        color: white;
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
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>

                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <tr>
                <?php
                include "conecter.php";
                $sql = "SELECT * FROM `cadastro`";
                $busca = mysqli_query($conecter, $sql);

                while ($array = mysqli_fetch_array($busca)) {
                    $idUser = $array['idUser'];
                    $user = $array['nomeUser'];
                    $endere = $array['endereco'];
                    $cell = $array['telefone'];








                ?>

                    <td> <?php echo $user; ?></td>

                    <td> <?php echo $endere; ?></td>

                    <td> <?php echo $cell; ?></td>

                    <td><a id="edi" class="btn btn-warnng" href="editar.php?id=<?php echo $idUser ?>" role="button">Editar</a>
                        <a id="exc" class="btn btn-warnng" href="deletar.php?id=<?php echo $idUser ?>" role="button">Excluir</a>
                    </td>
            </tr>


        <?php } ?>





        </table>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>