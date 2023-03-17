import javax.swing.JOptionPane;

public class Exercicio04 {

	public static void main(String[] args) {
		int x = Integer.parseInt(JOptionPane.showInputDialog("1 Valor:"));
		int y = Integer.parseInt(JOptionPane.showInputDialog("2 Valor:"));
		
		if(x > y) {
			System.out.println(x + " é maior que "+y); 
		}else if(x < y) {
			System.out.println(x + " é memor que "+y); 
		}else {
			System.out.println(x + " é igual a "+y);
		}

	}

}

