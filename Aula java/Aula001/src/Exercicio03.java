import javax.swing.JOptionPane;

public class Exercicio03 {

	public static void main(String[] args) {
		System.out.println("Calculadora");
		int x = Integer.parseInt(JOptionPane.showInputDialog("1 Valor:"));
		int y = Integer.parseInt(JOptionPane.showInputDialog("2 Valor:"));
		int soma = x + y;
		int subt = x - y;
		int mult = x * y;
		double divi = x / y;
		System.out.println("1 Valor: "+x);
		System.out.println("2 Valor: "+y);
		System.out.println("Soma: "+soma);
		System.out.println("Subtração: "+subt);
		System.out.println("Multiplicação: "+mult);
		System.out.println("Divisão: "+divi);
	}

}
