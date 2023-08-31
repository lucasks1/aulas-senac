<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="https://uploads.spiritfanfiction.com/historias/capas/202110/multiverso-dos-animes--cbu-collision-between-universes-23149291-311220211615.jpg">
</head>
<style>
    body {
        background-image: url("https://lunetas.com.br/wp-content/uploads/2022/04/animes-e-criancas-portal-lunetas.jpg");
    }

    #edi {
        background-color: yellow;
    }

    #exc {
        background-color: red;
        color: white;
    }

    .table {
        text-align: center;  
        background-color: #ffffffcc;
    }


    h3 {
        text-align: center;
    }
</style>

<body>
    <div class="container" style="margin-top: 40px">
        <h3 class="info">Lista de Animes</h3>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Estudio</th>

                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <tr>
                <?php
                include "conecter.php";
                $sql = "SELECT * FROM `animes`";
                $busca = mysqli_query($conecter, $sql);

                while ($array = mysqli_fetch_array($busca)) {
                    $idAnime = $array['idAnime'];
                    $name = $array['nome'];
                    $categ = $array['categoria'];
                    $dio = $array['estudio'];








                ?>

                    <td> <?php echo $name; ?></td>

                    <td> <?php echo $categ; ?></td>

                    <td> <?php echo $dio; ?></td>

                    <td><a id="edi" class="btn btn-warnng" href="editar.php?id=<?php echo $idAnime ?>" role="button">Editar</a>
                        <a id="exc" class="btn btn-warnng" href="deletar.php?id=<?php echo $idAnime ?>" role="button">Excluir</a>
                    </td>
            </tr>


        <?php } ?>





        </table>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>