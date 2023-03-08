<?php
$id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class= "container" style="margin-top:40px">
      <form action="atualizarproduto.php" method="post">
      
      <?php
      include "conexao.php";

      $sql = "SELECT * FROM `estoque` WHERE idProduto = $id";

      $buscar = mysqli_query($conexao, $sql);

      while ($array = mysqli_fetch_array($buscar)){

        $id_estoque = $array['idProduto'];        
        $nroproduto = $array['numeroProduto'];
        $nomeproduto = $array['nomeProduto'];
        $categoria = $array['categoria'];
        $quantidade = $array['quantidade'];
        $fornecedor = $array['fornecedor'];

        ?>
         <div class="container" style="margin-top: 40px">
       
            <div class="mb-3">
                <label>Número Produto</label>
                <input type="number" class="form-control" name="nroproduto"  value="<?php echo $nroproduto?>">
                <input type="number" class="form-control" name ="id" value="<?php echo $id?>" style = "display : none">
            </div>

            <div class="mb-3">
                <label>Nome Produto</label>
                <input type="text" class="form-control" name="nomeproduto"  value="<?php echo $nomeproduto?>">
            </div>

            <div class="mb-3">
                <label>Categoria</label>
                <select class="form-select" name="categoria"  value="<?php echo $categoria?>">
                    <option>Periféricos</option>
                    <option>Softwares</option>
                    <option>Licenças</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Quantidade</label>
                <input type="number" class="form-control" name="quantidade" value="<?php echo $quantidade?>">
            </div>

            <div class="mb-3">
                <label>Fornecedor</label>
                <select class="form-select" name = "fornecedor" value = "<?php echo $fornecedor?>">
                    <option>Fornecedor A</option>
                    <option>Fornecedor B</option>
                    <option>Fornecedor C</option>
                </select>

            </div>
            <button type="submit" class="btn btn-primary btn-small">Cadastrar</button>
        
        
      <?php } ?>

        </div>



      
      </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
</html>