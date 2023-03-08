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
        background: aqua;
    }
</style>

<body>
    <div class="container" style="margin-top: 40px">
        <h3>Lista de produto</h3>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Número do Produto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Fornecedor</th>
                </tr>
            </thead>

            <tr>
                <?php
                include "conexao.php";
                $sql = "SELECT * FROM `estoque`";
                $busca = mysqli_query($conexao, $sql);

                while ($array = mysqli_fetch_array($busca)) {
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
            </tr>


        <?php } ?>





        </table>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>