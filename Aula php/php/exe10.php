<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $n = 10;  ?>
    <?php $suss = $n + 1; ?>
    <?php $ant = $n - 1; ?>
    <?php if ($n >= 5) : ?>
        <strong>
            <h1>Sussessor: <?php echo $suss ?>
                <br> Antessor: <?php echo $ant ?>
            </h1>
        </strong>
    <?php endif ?>

</body>

</html>