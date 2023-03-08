package aula05;

import javax.swing.JOptionPane;

public class Professor extends Funcionario{
	
	private double horaAula;
	private int quantidade;
	private double salarioProf;
	
	public double getHoraAula() {
		return horaAula;
	}
	public void setHoraAula(double horaAula) {
		this.horaAula = horaAula;
	}
	public int getQuantidade() {
		return quantidade;
	}
	public void setQuantidade(int quantidade) {
		this.quantidade = quantidade;
	}
	public double getSalarioProf() {
		return salarioProf;
	}
	public void setSalarioProf(double salarioProf) {
		this.salarioProf = salarioProf;
	}
	
	public Professor() {
		super(0,null,0,0);
	}
	
	public void inserirFuncionario() {
		matricula = Integer.parseInt
				(JOptionPane.showInputDialog("Matrícula"));
		nomeFuncionario = JOptionPane.showInputDialog("Nome");
		quantidade = Integer.parseInt
				(JOptionPane.showInputDialog("Quantidade"));
		horaAula = Double.parseDouble
				(JOptionPane.showInputDialog("Hora Aula"));		
	}
	public void calcularSalarioProf(double salarioProf) {
		salarioProf = getQuantidade()*getHoraAula();
		this.salarioProf = salarioProf;
	}
	
	public void calcularInss(double inss) {
		inss = getSalarioProf() * 0.11;
		this.inss = inss;
	}
	public void calcularSalarioFinal(double salarioFinal) {
		salarioFinal = getSalarioProf() - getInss();
		this.salarioFinal = salarioFinal;
	}
	public void mostrarFuncionario() {
		System.out.println("Matrícula: "+super.getMatricula());
		System.out.println("Nome: "+super.getNomeFuncionario());
		System.out.println("Salário: "+getSalarioProf());
		System.out.println("Inss: "+super.getInss());
		System.out.println("Quantidade: "+getQuantidade());
		System.out.println("Hora Aula: "+getHoraAula());
		System.out.println("Salário Final: "+super.getSalarioFinal());	
		
	}
}
