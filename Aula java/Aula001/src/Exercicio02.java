import javax.swing.JOptionPane;

public class Exercicio02 {

	public static void main(String[] args) {
		System.out.println("Variaveis");
		System.out.println("");
		String nome = JOptionPane.showInputDialog("nome");
		System.out.println("nome: "+nome);
		int idade = Integer.parseInt(JOptionPane.showInputDialog("idade"));
		System.out.println("idade: "+idade);
		double media = Double.parseDouble(JOptionPane.showInputDialog("media"));
		System.out.println("Media: "+media);
		boolean  resposta = true;
		System.out.println("resposta: "+resposta);

	}

}
