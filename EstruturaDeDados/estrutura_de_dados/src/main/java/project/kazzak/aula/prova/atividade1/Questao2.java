package project.kazzak.aula.prova;
import java.util.Scanner;

public class Questao2 {

	public static void main(String[] args) {
		Scanner teclado = new Scanner(System.in);

		System.out.println("Digite uma quantidade de n�meros para ler");
		int IntQuantidade = teclado.nextInt();
		int[] list = new int[IntQuantidade];
		for(int i = 0;i<IntQuantidade;i++) {
			System.out.println("Qual o valor do numero " + (i+1));
			int n = teclado.nextInt();
			list[i]=n;
		}
		
		System.out.print("Numeros Lidos ");
		for (int i : list) {
			System.out.print(i + " ");
		}
		System.out.print("\nNumeros pares ");
		for(int i = list.length-1;i>=0;i--) {
			if(list[i]%2==0) {
				System.out.print(list[i] + " ");
			}
			
		}
	}

}
