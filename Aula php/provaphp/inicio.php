<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body {
        background-image: url("https://cdn.wallpapersafari.com/13/5/LvS09N.jpg");
    }

    #cada {
        background-color: green;
        color: white;
    }

    .container {
        color: white;
    }
</style>

<body>

    <div class="container" style="margin-top: 40px">
    <h1>Cadastor de Animes/Desenhos</h1>
        <form action="inseririnformações.php" method="post">
            <div class="mb-3">
                <label>nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Insira o seu nome">
            </div>

            <div class="mb-3">
                <label>tipo</label>
                <input type="text" class="form-control" name="tipo" placeholder="Insira o tipo de desenho">
            </div>


            <div class="mb-3">
                <label>temporada</label>
                <input type="number" class="form-control" name="temporada" placeholder="Insira o número da temporada">
            </div>


            <button id="cada" type="submit" class="btn btn-sucess btn-small">Cadastrar</button>
    
        </form>
    </div>





























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>