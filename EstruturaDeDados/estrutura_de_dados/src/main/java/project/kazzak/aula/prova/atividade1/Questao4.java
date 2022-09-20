package project.kazzak.aula.prova;
import java.util.Scanner;

public class Questao4 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner teclado = new Scanner(System.in);

		System.out.println("Digite uma quantidade de colunas e linhas para matriz");
		int IntQuantidade = teclado.nextInt();
		int[][] matriz = new int[IntQuantidade][IntQuantidade];
		int totalL = 0;
		int totalC=0;
		for( int i = 0;i<IntQuantidade;i++) {
			System.out.println("Numero " + (i+1));
			int v = teclado.nextInt();
			for (int j = 0; j < IntQuantidade; j++) {
				matriz[i][j]=v;
			}
		}
		System.out.println("Resultado da Matriz");
		for( int i = 0;i<IntQuantidade;i++) {
			for (int j = 0; j < IntQuantidade; j++) {
				System.out.print(matriz[i][j]);
				totalL+=matriz[i][j];
			}
			System.out.print(" - "+ totalL);
			totalL=0;
			totalC += matriz[i][0];
			System.out.print("\n");
		}
		System.out.print("-----\n");
		for( int i = 0;i<IntQuantidade;i++) {
			System.out.print(totalC);
		}
			
	}

}
