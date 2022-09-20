package project.kazzak.aula.prova;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class Questao1 {
	
	public static void main(String[] args) {
		
		Scanner teclado = new Scanner(System.in);
		List<Integer> arrNumeros = new ArrayList<Integer>();
		
		
		System.out.println("Digite uma quantidade de numeros para ler");
		int IntQuantidade = teclado.nextInt();
		System.out.println("Digite o valor de corte");
		int IntCorte = teclado.nextInt();

		
		for (int i = 0; i < IntQuantidade; i++) {
			System.out.println("Qual o valor do numero " + (i+1));
			int n = teclado.nextInt();
			if(n > IntCorte) {
				arrNumeros.add(n);
			}
		}
		System.out.println("Total de numeros maiores que o corte = " + arrNumeros.size());
		
	}
	

}
