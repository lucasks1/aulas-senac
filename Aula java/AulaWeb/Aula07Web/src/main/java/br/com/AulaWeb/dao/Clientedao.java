package br.com.AulaWeb.dao;

import java.sql.*;
import br.com.AulaWeb.entidades.*;

public class Clientedao extends Conexao {

	public void adicionar(Cliente cliente) throws ClassNotFoundException{
		String sql = "insert into cliente(nomeCliente,cpfCliente,emailCliente) " 
	         + "values(?,?,?)";
		try {
			open();
			stmt = con.prepareStatement(sql);
			stmt.setString(1, cliente.getNomeCliente());
			stmt.setString(2, cliente.getCpfCliente());
			stmt.setString(3, cliente.getEmailCliente());
			stmt.execute();
			
		} catch (SQLException e) {
            throw new RuntimeException(e);
		}
	}

}
