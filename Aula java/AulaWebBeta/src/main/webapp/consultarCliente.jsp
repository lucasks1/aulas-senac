<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
    
    <%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<%@ taglib uri="http://java.sun.com/jsp/jstl/functions" prefix="fn"%>

<%@ taglib uri="http://java.sun.com/jsp/jstl/fmt" prefix="fmt"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Consultar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<form action="buscarCliente" method="post">
<div class="form-group">
Nome: <input type="text" name="nome"  placeholder="Nome do Cliente" class="form-control">
</div>
<input type="submit" value="Buscar Cliente" class="btn btn-primary">
</form>
${msg}

<c:if test = "${fn:length(lista) >0 }">

<table class="table" >
 <thead>
        <tr>
           <th scope="col">ID</th>
<th scope="col">NOME CLIENTE</th>
<th scope="col">EMAIL</th>
<th scope="col">CPF</th>
<th scope="col">AÇÕES</th> 
        </tr>
 <thead>
 
 <c:forEach  var="linha" items="${lista}" >
    <tbody>
        <tr>
            <td scope="row"> ${linha.codCliente}</td>       
            <td> ${linha.nomeCliente}</td>
            <td> ${linha.emailCliente}</td>

            <td> ${linha.cpfCliente}</td>                       
            <td><a href="editarCliente.jsp?codCliente=${linha.codCliente}"  class="btn btn-warning">Editar</a>
	<a href="excluirCliente.jsp?Cliente=${linha.codCliente}"  class="btn btn-danger"
onclick="return confirm('Deseja realmente excluir o Cliente?')">Excluir</a>
</td>
        </tr>
       </tbody>
    </c:forEach>
</table>
</c:if>


</body>
</html>