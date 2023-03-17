<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<style>
   body{
    background-image:url("");
 }

 .clit{
        text-align: center;
        background-color: #ffffffcc;
    }
    
 .luf{
 	text-align: center;
 }

</style>
<body>
<div class="luf">
<img  alt=""  src="https://media1.tenor.com/images/d259f76b82df74676e7eba4091f32a37/tenor.gif?itemid=15159254">
</div>
<div class="clit">

<h1>Cadastro de Clientes</h1>
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
	</div>
</body>
</html>