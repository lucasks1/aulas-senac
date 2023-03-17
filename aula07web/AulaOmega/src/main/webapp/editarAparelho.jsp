<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<h3 class="page-header">Editar Aparelhos</h3>

<form id="cadastro" method="post" action="confirmarCliente">
<div class="form-group">
Nome Aparelho: <input type="text" name="nome" value="${ap.nomeAparelho}" class="form-control">
</div>
<div class="form-group">
Marca: <input type="email" name="email" value="${ap.marcaAparelho}" class="form-control">
</div>
<div class="form-group">
Valor do Conserto:
<input type="text" name="cpf" value="${ap.valorConserto}" class="form-control">
</div>

<input type="hidden" name="codigo" value="${cdi.codCliente}"> 
<input type="submit" value="Editar Cliente" class="btn btn-primary">

</form>
</body>
</html>