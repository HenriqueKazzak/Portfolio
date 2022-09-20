package project.kazzak.aula.prova;

import java.util.Scanner;

public class Questao5 {
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner teclado = new Scanner(System.in);

		System.out.println("Digite uma quantidade de linhas para matriz");
		int IntLinhas = teclado.nextInt();
		System.out.println("Digite uma quantidade de Colunas para matriz");
		int IntColunas = teclado.nextInt();
		int[][] matriz = new int[IntLinhas][IntColunas];
		int[][] matriz2= new int[IntLinhas][IntColunas];
		
		
		
		for( int i = 0;i<IntLinhas;i++) {
			for (int j = 0; j < IntColunas; j++) {
				System.out.println("Numero " + (j+1));
				int v = teclado.nextInt();
				matriz[i][j]=v;
			}
		}
		
		for( int i = 0;i<IntLinhas;i++) {
			for (int j = 0; j < IntColunas; j++) {
				matriz2[i][j]=matriz[i][j]+((i+1)>(IntLinhas-1)?0:matriz[i+1][j])+((j+1)>(IntColunas-1)?0:matriz[i][j+1]);
			}
		}
		
		System.out.println("Matriz");
		for( int i = 0;i<matriz.length;i++) {
			for (int j = 0; j < IntColunas; j++) {
				System.out.print(matriz[i][j] + " ");
			}
			System.out.print("\n");
		}
		System.out.println("Resultado da Matriz");
		for( int i = 0;i<IntLinhas;i++) {
			for (int j = 0; j < IntColunas; j++) {
				System.out.print(matriz2[i][j] + " ");
			}
			System.out.print("\n");
		}
		
	}

}

