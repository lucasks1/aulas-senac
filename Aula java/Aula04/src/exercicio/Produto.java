package exercicio;

import javax.swing.JOptionPane;

public class Produto {

	public static void main(String[] args) {

		double total = 0;

		Produto produto = new Produto();
		produto.inserirProduto();
		produto.calcularTotal(total);
		produto.mostrarProduto();

	}

	private int codProduto;
	private String nomeProduto;
	private int quant;
	private double unidade;
	private double total;

	public int getCodProduto() {
		return codProduto;
	}

	public void setCodProduto(int codProduto) {
		this.codProduto = codProduto;
	}

	public String getNomeProduto() {
		return nomeProduto;
	}

	public void setNomeProduto(String nomeProduto) {
		this.nomeProduto = nomeProduto;
	}

	public int getQuant() {
		return quant;
	}

	public void setQuant(int quant) {
		this.quant = quant;
	}

	public double getUnidade() {
		return unidade;
	}

	public void setUnidade(double unidade) {
		this.unidade = unidade;
	}

	public double getTotal() {
		return total;
	}

	public void setTotal(double total) {
		this.total = total;
	}

	public Produto() {

	}

	void inserirProduto() {
		codProduto = Integer.parseInt(JOptionPane.showInputDialog("Codigo: "));
		nomeProduto = JOptionPane.showInputDialog("Nome: ");
		quant = Integer.parseInt(JOptionPane.showInputDialog("Quantidade: "));
		unidade = Double.parseDouble(JOptionPane.showInputDialog("Unidade: "));

	}

	void calcularTotal(double total) {
		total = getQuant() * getUnidade();
		this.total = total;

	}

	void mostrarProduto() {
		System.out.println("cod: " + codProduto);
		System.out.println("Nome: " + nomeProduto);
		System.out.println("quantidade: " + quant);
		System.out.println("Unidade: " + unidade);
		System.out.println("Total: " + total);
	}

}
