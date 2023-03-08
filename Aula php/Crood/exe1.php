<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<style>
    h1{
        color:peru
    }
</style>
</head>

<body>

    <center>
        <h1> Cadastro de produtos</h1>
    </center>

    <form action="exer1.php" method="POST">
        <div class="mb-3">
            <label>Nome do produto</label>
            <input type="text" class="form-control" placeholder="Insira o numero do produto" name="nomep">
        </div>

        <div class="mb-3">
            <label>Numero do produto</label>
            <input type="number" class="form-control" placeholder="Insira o numero do produto" name="nump">
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select class="form-select" name="cate">
                <option>Massa</option>
                <option>Vegetal</option>
                <option>Liquido</option>
                <option>Cosido</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Qantidade</label>
            <input type="number" class="form-control" name="quant">
        </div>

        <div class="mb-3">
            <label>fornecedor</label>
            <select class="form-select" name="fornecedor">
                <option>Caseiro</option>
                <option>Fábrica</option>
                <option>India</option>
                <option>Não há</option>
            </select>

        </div>
        <button type="submit">Proximo</button>
    </form>





















































</body>

</html>