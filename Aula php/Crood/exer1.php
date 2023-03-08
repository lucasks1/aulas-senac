<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include "conexao.php";

    $nomeprod = $_POST['nomep'];
    echo "<br>Nome do produto é:$nomeprod";

    $numero = $_POST['nump'];
    echo "<br>O numero do produto é: $numero";

    $c1 = $_POST['cate'];
    echo "<br>categoria produtos: $c1";

    $quantidade = $_POST['quant'];
    echo "<br>Quantidade é:$quantidade";

    $f1 = $_POST['fornecedor'];
    echo "<br>Fornecedor: $f1";

    $sql =  "INSERT INTO `estoque`(`nomeproduto`, `numeroProduto`, `categoria`, `quantidade`, `Fornecedorr`)
     VALUES ($nomeprod,$numero,$c1,$quantidade,$f1)";

    $inserir = mysqli_query($conexao, $sql);
    ?>
    <h4><?php echo "cadastrado com sussesso" ?></h4>
</body>

</html>