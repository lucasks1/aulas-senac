<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <style>
        h1{
            color:black
        }
        h2{
            color:red
        }
        h3{
            color:black
        }
        h4{
            color:red
        }
    </style>
</head>   
<body>
    <?php
    $numero = (8+2);

    $sub = (100-50);

     $mult = (100*100);

     $div = (100/10);
    ?>
    <marquee behavior="" direction="">       

    <h1> O valor é: <?php echo $numero?></h1>
    <h2>O valor é: <?php echo $sub?></h2>
    <h3>O valor é: <?php echo $mult?></h3>
    <h4> O valor é: <?php echo $div?></h4>
    </marquee>
</body>
</html>