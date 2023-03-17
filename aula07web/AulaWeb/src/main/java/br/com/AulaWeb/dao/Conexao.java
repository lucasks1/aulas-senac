package br.com.AulaWeb.dao;
import java.sql.*;
public class Conexao {
	protected PreparedStatement stmt; //linguagem
	protected ResultSet rs;//atingir o banco
	protected Connection con;//conexâo
	
	private final String url = "jdbc:mysql://localhost/loja";
	private final String user = "root";
	private final String pass = "";
	
	protected void open() {
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			con = DriverManager.getConnection(url,user,pass);
		}catch(Exception e) {
			e.printStackTrace();
		}
	}
}
