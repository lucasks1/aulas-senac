package br.com.AulaWeb.dao;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

import br.com.AulaWeb.entidades.*;



public class AparelhoDao extends Conexao{
	public void adicionar(Aparelho aparelho) throws ClassNotFoundException {
		String sql = "insert into aparelho(nomeAparelho, marcaAparelho, valorConserto, descricaoDefeito,codCliente) "
				+ "values (?,?,?,?,?)";
		try {
		open();
			stmt = con.prepareStatement(sql);
			stmt.setString(1, aparelho.getNomeAparelho());
			stmt.setString(2, aparelho.getMarcaAparelho());
			stmt.setDouble(3, aparelho.getValorConserto());
			stmt.setString(4, aparelho.getDescricaoDefeito());
			stmt.setInt(5, aparelho.getCliente().getCodCliente());
			
			stmt.execute();
			
		}catch(SQLException e) {
			throw new RuntimeException(e);
		}
	}
	
	
	public List<Aparelho> listarAparelho(String nomeAparelho) throws ClassNotFoundException, SQLException {

		open();

		stmt = this.con.prepareStatement("select * from cliente inner join aparelho" 
				+ "	on cliente.codCliente = aparelho.codAparelho where nomeAparelho like ?");
		stmt.setString(1, nomeAparelho + "%");

		rs = stmt.executeQuery();
		List<Aparelho> aparelhos = new ArrayList<Aparelho>();

		while (rs.next()) {
		// criando o objeto Cliente
		Aparelho aparelho = new Aparelho();
		aparelho.setCodAparelho(rs.getInt("codAparelho"));
		aparelho.setNomeAparelho(rs.getString("nomeAparelho"));
		aparelho.setMarcaAparelho(rs.getString("marcaAparelho"));
		aparelho.setValorConserto(rs.getDouble("valorConserto"));
		Cliente cliente = new Cliente();
		cliente.setCodCliente(rs.getInt("codAparelho"));
		cliente.setNomeCliente(rs.getString("nomeCliente"));
		aparelho.setCliente(cliente);

		// adicionando o objeto lista
		aparelhos.add(aparelho);
		}
		
		return aparelhos;

		}
	
	
	public Aparelho buscarPorIdAparelho(int codAparelho) throws ClassNotFoundException, SQLException {
			
		open();
		stmt = this.con.prepareStatement("select * from cliente inner join aparelho" 
				+ "	on cliente.codCliente = aparelho.codCliente where nomeAparelho like ?");
		stmt.setInt(1, codAparelho);

		Aparelho aparelho = null;
		rs = stmt.executeQuery();

		if(rs.next()) {
			 aparelho = new Aparelho();
			 Cliente cliente = new Cliente();
			aparelho.setCodAparelho(rs.getInt("codAparelho"));
			aparelho.setNomeAparelho(rs.getString("nomeAparelho"));
			aparelho.setMarcaAparelho(rs.getString("marcaAparelho"));
			aparelho.setValorConserto(rs.getDouble("valorConserto"));
		
			
			cliente.setCodCliente(rs.getInt("codAparelho"));
			cliente.setNomeCliente(rs.getString("nomeCliente"));
			aparelho.setCliente(cliente);
			
			
		}
		
		return aparelho;
		}
	
	public void editar(Aparelho aparelho) throws ClassNotFoundException {
		String sql = "update aparelho set nomeAparelho=?, marcaAparelho=?,  valorConserto=?, descricaoDefeito=?, codCliente = ?"
				+ " where codCliente=?";

		try {
		open();
		stmt = con.prepareStatement(sql);
		stmt.setString(1, aparelho.getNomeAparelho());
		stmt.setString(2, aparelho.getMarcaAparelho());
		stmt.setDouble(3, aparelho.getValorConserto());
		stmt.setString(4, aparelho.getDescricaoDefeito());
		stmt.setInt(5, aparelho.getCliente().getCodCliente());
		
		stmt.setInt(6, aparelho.getCodAparelho());

		stmt.execute();
		
		} catch (SQLException e) {
			throw new RuntimeException(e);
		}
		}
	
	public void excluir(Aparelho aparelho) throws ClassNotFoundException {

		try {
			open();
			stmt = con.prepareStatement("delete from aparelho where codAparelho=?");
			stmt.setInt(1, aparelho.getCodAparelho());
			stmt.execute();
			
		} catch (SQLException e) {
			throw new RuntimeException(e);
		}
	}
	public List<Cliente> listar() throws SQLException{
		open();
		//Preparar a consulta com a Query sql
		String sql = "select * from cliente";
		stmt = con.prepareStatement(sql);
		List<Cliente> lista = new ArrayList<Cliente>();
		
		//Exceutando a query no Banco de Dados e passando a lista para rs
		rs = stmt.executeQuery();
		
		//Vamos usar o while para varrer a lista e popul�-la
		//Enquanto tiver linhas de registro no BD, o rs retorna a lista de dados
		while(rs.next()) {
			//Criando um objeto do tipo Categoria
			Cliente cli = new Cliente();
			cli.setCodCliente(rs.getInt("codCliente"));
			cli.setNomeCliente(rs.getString("nomeCliente"));
			
			//Adicionar o idCategoria e o nomeCategoria � lista.
			lista.add(cli);
		}
		
		return lista;
	}
	
}

