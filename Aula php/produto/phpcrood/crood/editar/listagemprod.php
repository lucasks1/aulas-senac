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
        background: silver;
    }
</style>

<body>
    <div class="container" style="margin-top: 40px">
    <marquee behavior="" direction="">
        <h3>Lista de produto</h3>
        </marquee>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Número do Produto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <tr>
                <?php
                include "conexao.php";
                $sql = "SELECT * FROM `estoque`";
                $buscar = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($buscar)) {
                    $idProduto = $array ['idProduto'];
                    $nomeproduto = $array['nomeProduto'];
                    $nroproduto = $array['numeroProduto'];
                    $categoria = $array['categoria'];
                    $quantidade = $array['quantidade'];
                    $fornecedor = $array['fornecedor'];







                ?>

                    <td> <?php echo $nomeproduto; ?></td>

                    <td> <?php echo $nroproduto; ?></td>

                    <td> <?php echo $categoria; ?></td>

                    <td> <?php echo $quantidade; ?></td>

                    <td> <?php echo $fornecedor; ?></td>

                    <td> <a class="btn btn-warning" href="editar.php?id= <?php echo $idProduto ?>" role="button">editar</a>
                        <a class="btn btn-danger" href="deletar.php?id= <?php echo $idProduto ?>" role="button">Excluir</a>


                    </td>


            </tr>


        <?php } ?>





        </table>

    </div>


</body>

</html>