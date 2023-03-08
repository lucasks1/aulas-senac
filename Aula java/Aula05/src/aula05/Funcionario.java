package aula05;

import javax.swing.JOptionPane;

public abstract class Funcionario {

	protected int matricula;
	public String nomeFuncionario;
	public double inss;
	public double salarioFinal;
	
	
	public int getMatricula() {
		return matricula;
	}


	public void setMatricula(int matricula) {
		this.matricula = matricula;
	}


	public String getNomeFuncionario() {
		return nomeFuncionario;
	}


	public void setNomeFuncionario(String nomeFuncionario) {
		this.nomeFuncionario = nomeFuncionario;
	}


	public double getInss() {
		return inss;
	}


	public void setInss(double inss) {
		this.inss = inss;
	}


	public double getSalarioFinal() {
		return salarioFinal;
	}


	public void setSalarioFinal(double salarioFinal) {
		this.salarioFinal = salarioFinal;
	}

	public Funcionario(int matricula, String nomeFuncionario,
			double inss, double salarioFinal) {
		
	}
	
	public abstract void inserirFuncionario();
	public abstract void calcularInss(double inss);
	public abstract void calcularSalarioFinal(double salarioFinal);
	public abstract void mostrarFuncionario();
	
	public static void main(String[] args) {
		
		double salarioProf = 0;
		double inss = 0;
		double salarioFinal = 0;
		double bonus = 0;
		
		System.out.println("Menu");
		System.out.println("");
		System.out.println("1 - Professor");
		System.out.println("2 - Administração");
		
		int resp = JOptionPane.YES_OPTION;
		while (resp == JOptionPane.YES_OPTION) {
			int op = Integer.parseInt
					(JOptionPane.showInputDialog("Opção:"));
			switch(op) {
			case 1:
				Professor p = new Professor();
				p.inserirFuncionario();
				p.calcularSalarioProf(salarioProf);
				p.calcularInss(inss);
				p.calcularSalarioFinal(salarioFinal);
				p.mostrarFuncionario();
			break;
			case 2:
				Administracao adm = new Administracao();
				adm.inserirFuncionario();
				adm.calcularBonus(bonus);
				adm.calcularInss(inss);
				adm.calcularSalarioFinal(salarioFinal);
				adm.mostrarFuncionario();
			break;
			default:
				JOptionPane.showMessageDialog
				(null, "Opção Inválida");
			}
			resp = JOptionPane.showConfirmDialog
					(null, "Deseja Continuar","Mensagem",JOptionPane.YES_NO_OPTION);
			if (resp == JOptionPane.YES_OPTION) {
				
			}			
		}	

	}

}