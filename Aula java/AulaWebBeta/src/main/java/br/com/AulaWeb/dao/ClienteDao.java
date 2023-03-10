package br.com.AulaWeb.dao;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

import br.com.AulaWeb.entidades.*;

public class ClienteDao extends Conexao{
	
	public void adicionar(Cliente cliente) throws ClassNotFoundException {
		String sql = "insert into cliente(nomeCliente,cpfCliente,emailCliente) "
				+ "values (?,?,?)";
		try {
		open();
			stmt = con.prepareStatement(sql);
			stmt.setString(1, cliente.getNomeCliente());
			stmt.setString(2, cliente.getCpfCliente());
			stmt.setString(3, cliente.getEmailCliente());
			stmt.execute();
			
		}catch(SQLException e) {
			throw new RuntimeException(e);
		}
	}
	public List <Cliente> listarCliente(String nome) throws ClassNotFoundException, SQLException {

		open();

		stmt = this.con.prepareStatement("select * from cliente where nomeCliente like ?");
		stmt.setString(1, nome + "%");

		rs = stmt.executeQuery();
		List<Cliente> clientes = new ArrayList<Cliente>();

		while (rs.next()) {
		// criando o objeto Cliente
		Cliente cliente = new Cliente();
		cliente.setCodCliente(rs.getInt("CodCliente"));
		cliente.setNomeCliente(rs.getString("nomeCliente"));
		cliente.setEmailCliente(rs.getString("emailCliente"));
		cliente.setCpfCliente(rs.getString("cpfCliente"));

		// adicionando o objeto lista
		clientes.add(cliente);
		}
		
		return clientes;

		}
	
}
