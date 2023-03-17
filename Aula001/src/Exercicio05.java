import javax.swing.JOptionPane;

public class Exercicio05 {

	public static void main(String[] args) {
		int x = Integer.parseInt(JOptionPane.showInputDialog("idade:"));
		
		if(x >= 65 ) {
			System.out.println(x + " idade feliz"); 
		}else if(x < 65 && x >= 18) {
			System.out.println(x + " maior de idade"); 
		}else {
			System.out.println(x + " menor de idade");
		}

	}

}
