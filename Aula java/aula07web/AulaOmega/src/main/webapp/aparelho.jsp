<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
    
  <%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@taglib uri="http://java.sun.com/jsp/jstl/functions" prefix="fn" %>
	
<jsp:useBean id="ap" class="br.com.AulaWeb.bean.ClienteBean"></jsp:useBean>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<h1>Cadastro de Aparelho</h1>
	<form action="cadastrarAparelho" method="post">
	
	<p>
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome">
	</p>
	<p>
	
		<label for="marca">Marca:</label>
		<input type="text" name="marca" id="marca">
	</p>
	
	<p>
		<label for="valor">Valor:</label>
		<input type="text" name="valor" id="valor">
	</p>
	
	<p>
		<label for="descricao">Descrição:</label>
		<input type="text" name="descricao" id="descricao">
	</p>
	
	<div class="form-group"> 
	
	    Proprietário do Aparelho:
	    <select name="codCliente" class="form-control">
		    <option value="0">Selecione</option>
		    <c:if test="${fn:length(ap.listarCliente) > 0}">
		    	<c:forEach items="${ap.listarCliente}" var="cli">    
		    		<option value="${cli.codCliente}">${cli.nomeCliente}</option> 
	    		</c:forEach>
	    	</c:if>   	    
	    </select>
	    
    </div>    
    
	<p>
		<button type="submit">Cadastrar</button>
	</p>
	
	</form>
	
</body>
</html>