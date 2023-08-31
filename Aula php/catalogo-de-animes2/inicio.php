<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo de Animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="https://uploads.spiritfanfiction.com/historias/capas/202110/multiverso-dos-animes--cbu-collision-between-universes-23149291-311220211615.jpg">
</head>
<style>
    body {
        background-image: url("https://lunetas.com.br/wp-content/uploads/2022/04/animes-e-criancas-portal-lunetas.jpg");
    }

    #cada {
        background-color: green;
        color: white;
    }

    .container {
        text-align: center;
        background-color: #ffffffcc;
    }

    h1 {
        text-align: center;
    }
</style>

<body>

    <h1>Cadrastro de Animes</h1>

    <div class="container" style="margin-top: 40px">
        <form action="inserir.php" method="post">
            <div class="mb-3">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Insira o nome">
            </div>

            <div class="mb-3">
                <label>Categoria</label>
                <input type="text" class="form-control" name="categ" placeholder="Insira a categoria">
            </div>


            <div class="mb-3">
                <label>Estudio</label>
                <input type="text" class="form-control" name="dio" placeholder="Insira o estudio">
            </div>


            <button id="cada" type="submit" class="btn btn-sucess btn-small">Cadastrar</button>
        </form>
    </div>





























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>