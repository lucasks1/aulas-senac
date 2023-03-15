package br.com.AulaWeb.entidades;

public class Aparelho {
	
	protected int codAparelho;
	public String nomeAparelho;
	public String marcaAparelho;
	public double valorConserto;
	public String descricaoDefeito;
	public Cliente  cliente;
	
	public int getCodAparelho() {
		return codAparelho;
	}
	public void setCodAparelho(int codAparelho) {
		this.codAparelho = codAparelho;
	}
	public String getNomeAparelho() {
		return nomeAparelho;
	}
	public void setNomeAparelho(String nomeAparelho) {
		this.nomeAparelho = nomeAparelho;
	}
	public String getMarcaAparelho() {
		return marcaAparelho;
	}
	public void setMarcaAparelho(String marcaAparelho) {
		this.marcaAparelho = marcaAparelho;
	}
	public double getValorConserto() {
		return valorConserto;
	}
	public void setValorConserto(double valorConserto) {
		this.valorConserto = valorConserto;
	}
	public String getDescricaoDefeito() {
		return descricaoDefeito;
	}
	public void setDescricaoDefeito(String descricaoDefeito) {
		this.descricaoDefeito = descricaoDefeito;
	}
	public Cliente getCliente() {
		return cliente;
	}
	public void setCliente(Cliente cliente) {
		this.cliente = cliente;
	}
	
	public Aparelho() {
		
	}
	
	public Aparelho(
			int codAparelho,
			String nomeAparelho,
			String marcaAparelho,
			double valorConserto,
			String descricaoDefeito,
			Cliente cliente
			) {
		
		this.codAparelho = codAparelho;
		this.nomeAparelho = nomeAparelho;
		this.marcaAparelho = marcaAparelho;
		this.valorConserto = valorConserto;
		this.descricaoDefeito = descricaoDefeito;
		this.cliente = cliente;
		
	}

}
