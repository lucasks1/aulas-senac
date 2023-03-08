package aula05;

import javax.swing.JOptionPane;

public class Administracao extends Funcionario {
	
	private double salarioAdm;
	private double bonus;

	
	public double getBonus() {
		return bonus;
	}

	public void setBonus(double bonus) {
		this.bonus = bonus;
	}

	public double getSalarioAdm() {
		return salarioAdm;
	}

	public void setSalarioAdm(double salarioAdm) {
		this.salarioAdm = salarioAdm;
	}

	public Administracao() {
		super(0, null, 0, 0);
	}
	
	public void inserirFuncionario() {
		matricula = Integer.parseInt
				(JOptionPane.showInputDialog("Matricular"));
		nomeFuncionario = JOptionPane.showInputDialog("Nome do Funcionario");
		salarioAdm = Double.parseDouble
				(JOptionPane.showInputDialog("Salario"));
	}
	
	public void calcularBonus(double bonus) {
		bonus = getSalarioAdm()  + 300;
		this.bonus= bonus;
	}
	
	public void calcularInss (double inss) {
		inss =getSalarioAdm()  * 0.11;
		this.inss = inss;
	}
	
	public void calcularSalarioFinal(double salarioFinal) {
		salarioFinal = getSalarioAdm() - getInss();
		this.salarioFinal = salarioFinal;
	}
	
	public void mostrarFuncionario() {
		System.out.println("Matrícula: "+super.getMatricula());
		System.out.println("Nome: "+super.getNomeFuncionario());
		System.out.println("Salário : "+getSalarioAdm());
		System.out.println("Bônus: "+getBonus());
		System.out.println("Inss: "+super.getInss());
		System.out.println("Salario Final: "+super.getSalarioFinal());
		
	}
	
	
}

