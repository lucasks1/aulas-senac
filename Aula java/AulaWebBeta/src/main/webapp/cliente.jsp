<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Cadastrar Anime</title>
</head>
<body>
<img alt="" src="https://media.tenor.com/mFDPXvyZT7IAAAAM/luffy-one-piece.gif">
<h1>Cadastro OnePiece</h1>
	<form action="cadastrarCliente" method="post">
	<p>
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome">
	</p>
	<p>
		<label for="cpf">CPF:</label>
		<input type="text" name="cpf" id="cpf">
	</p>
	<p>
		<label for="email">E-mail:</label>
		<input type="text" name="email" id="email">
	</p>
	<p>
		<button type="submit">Cadastrar</button>
	</p>
	</form>
</body>
</html>