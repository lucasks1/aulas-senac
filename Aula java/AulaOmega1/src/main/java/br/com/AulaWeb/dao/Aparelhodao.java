package br.com.AulaWeb.dao;

import java.sql.SQLException;

import br.com.AulaWeb.entidades.Aparelho;


public class Aparelhodao extends Conexao{
	public void adicionar(Aparelho aparelho) throws ClassNotFoundException {
		String sql = "insert into cliente(nomeAparelho,marcaAparelho,valorConserto,descricaoDefeito,codCliente) "
				+ "values (?,?,?)";
		try {
		open();
			stmt = con.prepareStatement(sql);
			stmt.setString(1, aparelho.getNomeAparelho());
			stmt.setString(2, aparelho.getMarcaAparelho());
			stmt.setDouble(3, aparelho.getValorConserto());
			stmt.setString(4, aparelho.getDescricaoDefeito());
			stmt.setString(5, aparelho.getCliente().getCpfCliente());

			stmt.execute();
			
		}catch(SQLException e) {
			throw new RuntimeException(e);
		}
	}
	
	
}


