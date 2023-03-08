<?php
$servername = "localhost";
$database = "produtos";
$username = "root";
$password = "";

$conexao = mysqli_connect ($servername,$database,$username,$password);
echo mysqli_connect_error();
?>