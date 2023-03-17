import javax.swing.JOptionPane;

public class Ecercicio06 {

	public static void main(String[] args) {
		String nome = JOptionPane.showInputDialog("nome");
		System.out.println("nome: "+nome);
		int peso = Integer.parseInt(JOptionPane.showInputDialog("seu peso"));
		System.out.println("seu peso: "+peso);
		double altura = Double.parseDouble(JOptionPane.showInputDialog(" sua altura"));
		System.out.println(" sua altura: "+altura);
		double imc = peso / (altura* altura);
		System.out.println("Imc: "+imc);
		
		if(imc >= 40) {
			System.out.println(imc +" = Obesidade Grave");
		}else if(imc > 30.0 && imc < 39.9) {
			System.out.println(imc +" = Obsidade");
		}else if(imc > 18.5 && imc < 24.9) {
			System.out.println(imc +" =  Normal");
		}else {
			System.out.println(imc +" = Magreza");
		}

	}

}
 