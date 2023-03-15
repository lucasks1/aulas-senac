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
	/*cole aquiiiii*/
	
	public List<Cliente> listarCliente(String nome) throws ClassNotFoundException, SQLException {

		open();

		stmt = this.con.prepareStatement("select * from cliente where nomeCliente like ?");
		stmt.setString(1, nome + "%");

		rs = stmt.executeQuery();
		List<Cliente> clientes = new ArrayList<Cliente>();

		while (rs.next()) {
		// criando o objeto Cliente
		Cliente cliente = new Cliente();
		cliente.setCodCliente(rs.getInt("codCliente"));
		cliente.setNomeCliente(rs.getString("nomeCliente"));
		cliente.setEmailCliente(rs.getString("emailCliente"));
		cliente.setCpfCliente(rs.getString("cpfCliente"));

		// adicionando o objeto lista
		clientes.add(cliente);
		}
		
		return clientes;

		}
	
	
	public Cliente buscarPorIdCliente(int codCliente) throws ClassNotFoundException, SQLException {
			
		open();
		String sql = "select * from cliente where codCliente=?";
		stmt = con.prepareStatement(sql);
		stmt.setInt(1, codCliente);

		Cliente cliente = null;
		rs = stmt.executeQuery();

		if (rs.next()) {
		cliente = new Cliente(
				rs.getInt("codCliente"), 
				rs.getString("nomeCliente"), 
				rs.getString("cpfCliente"),		
		rs.getString("emailCliente"));
		}
		
		return cliente;
		}
	
	public void editar(Cliente cliente) throws ClassNotFoundException {
		String sql = "update cliente set nomeCliente=?, emailCliente=?,  cpfCliente=? where codCliente=?";

		try {
		open();
		stmt = con.prepareStatement(sql);
		stmt.setString(1, cliente.getNomeCliente());
		stmt.setString(2, cliente.getEmailCliente());
		stmt.setString(3, cliente.getCpfCliente());
		stmt.setInt(4, cliente.getCodCliente());

		stmt.execute();
		
		} catch (SQLException e) {
			throw new RuntimeException(e);
		}
		}
	
	public void excluir(Cliente cliente) throws ClassNotFoundException {

		try {
			open();
			stmt = con.prepareStatement("delete from cliente where codCliente=?");
			stmt.setInt(1, cliente.getCodCliente());
			stmt.execute();
			
		} catch (SQLException e) {
			throw new RuntimeException(e);
		}
	}

}
