<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="margin-top: 40px">
        <form action = "inserirproduto.php" method="post">
            <div class="mb-3">
                <label>Número Produto</label>
                <input type="number" class="form-control" name="nroproduto" placeholder="Insira o número do produto">
            </div>

            <div class="mb-3">
                <label>Nome Produto</label>
                <input type="text" class="form-control" name="nomeproduto" placeholder="Insira o nome do produto">
            </div>

            <div class="mb-3">
                <label>Categoria</label>
                <select class="form-select" name="categoria" aria-label="Default select example">
                    <option>Periféricos</option>
                    <option>Softwares</option>
                    <option>Licenças</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Quantidade</label>
                <input type="number" class="form-control" name="quantidade" placeholder="Insira o número do produto">
            </div>

            <div class="mb-3">
                <label>Fornecedor</label>
                <select class="form-select" name = "fornecedor">
                    <option>Microsoft</option>
                    <option>Fornecedor B</option>
                    <option>Fornecedor C</option>
                </select>

            </div>
            <button type="submit" class="btn btn-sucess btn-small">Cadastrar</button>
        </form>
        </div>





























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>