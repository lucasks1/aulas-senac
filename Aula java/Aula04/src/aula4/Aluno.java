package aula4;

import javax.swing.JOptionPane;

public class Aluno {
	/*
	 * 1- criar vvisibilidade 2- Tipar a variavel 3-criar variavel
	 */

	

	/* Criar os encapsulamentos */

	public static void main(String[] args) {
		double media = 0;
        String situacao = null; 
		Aluno aluno = new Aluno(); // construtor objeto = new class
		aluno.inserirAluno();
		aluno.calcularmedia(media);
		aluno.verificarSituacao(situacao);
        aluno.mostrarAluno(); 
	}
		private String nomeAluno;
		private String cpfAluno;
		private double prova01;
		private double prova02;
		private double media;
		private String situacao;
		
		
	
	

	public String getNomeAluno() {
		return nomeAluno;
	}

	public void setNomeAluno(String nomeAluno) {
		this.nomeAluno = nomeAluno;
	}

	public String getCpfAluno() {
		return cpfAluno;
	}

	public void setCpfAluno(String cpfAluno) {
		this.cpfAluno = cpfAluno;
	}

	public double getProva01() {
		return prova01;
	}

	public void setProva01(double prova01) {
		this.prova01 = prova01;
	}

	public double getProva02() {
		return prova02;
	}

	public void setProva02(double prova02) {
		this.prova02 = prova02;
	}

	public double getMedia() {
		return media;
	}

	public void setMedia(double media) {
		this.media = media;
	}

	public String getSituacao() {
		return situacao;
	}

	public void setSituaçao(String situaçao) {
		this.situacao = situaçao;
	}

	/* Criar o construtor */
	public Aluno() {

	}

	/* void= criação de metodos = Chamada */

	void inserirAluno() {
		nomeAluno = JOptionPane.showInputDialog("Nome ");
		cpfAluno = JOptionPane.showInputDialog("CPF: ");
		prova01 = Double.parseDouble(JOptionPane.showInputDialog("Prova01: "));
		prova02 = Double.parseDouble(JOptionPane.showInputDialog("Prova02: "));
	}

	void calcularmedia(double media) {
		media = (getProva01() + getProva02()) / 2;
		this.media = media;
	}

	void verificarSituacao(String Situacao) {
		if (getMedia() >= 7) {
			situacao = "Aprovado";
		} else if (getMedia() >= 5) {
			situacao = "Recuperação";
		} else {
			situacao = "Reprovado";
		}
	}
	void mostrarAluno() {
		System.out.println("nome: " + getNomeAluno());
		System.out.println("CPF: " + getCpfAluno());
		System.out.println("Prova 01 : " + getProva01());
		System.out.println("Prova 02: " + getProva02());
		System.out.println("Média: " + getMedia());
		System.out.println("SItuação: " + getSituacao());
	}
}
