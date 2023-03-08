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
$x = 3;  ?>
    <?php $dob = $x * 3; ?>
    <?php $meta = $x / 3; ?>
    <?php if ($x >= 3) : ?>
        <strong>
            <h1>dorbro: <?php echo $dob ?>
                <br> metade: <?php echo $meta ?>
            </h1>
        </strong>
    <?php endif ?>
</body>
</html>