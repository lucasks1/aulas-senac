<?php


         include "conexao.php";

        $idproduto = $_POST['idProduto'];        
        $nroproduto = $_POST['numeroProduto'];
        $nomeproduto = $_POST['nomeProduto'];
        $categoria = $_POST['categoria'];
        $quantidade = $_POST['quantidade'];
        $fornecedor = $_POST['fornecedor'];
       
        $sql = "UPDATE `estoque` SET `nomeProduto`=$nroproduto,
        `numeroProduto`=$nomeproduto,`categoria`=$categoria,`quantidade`=$quantidade`fornecedor`=$fornecedor
         WHERE idProduto = $idProduto";

         $atualizar = mysqli_query($conexao, $sql);
        ?>
       <marquee behavior="" direction="">
        <h1>Atualizado com sussesso</h1>
        </marquee>