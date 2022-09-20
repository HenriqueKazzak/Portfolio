package project.kazzak.aula.prova;
import java.util.Scanner;
public class Questao3 {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner teclado = new Scanner(System.in);

		System.out.println("Digite uma quantidade de n�meros para ler");
		int IntQuantidade = teclado.nextInt();
		Double [] notas = new Double[IntQuantidade];
		String[] alunos = new String[IntQuantidade];
		Double total = 0.0;
		Double media;
		
		for(int i = 0; i<IntQuantidade;i++) {
			System.out.println("Digite o nome do(a) aluno");
			String aluno = teclado.next();	
			
			System.out.println("Digite a nota do(a) " + aluno);
			float nota = teclado.nextFloat();
			
			alunos[i]=aluno;
			notas[i]=(double) nota;
			total +=(double)nota;
		}
		media = total/IntQuantidade;
		System.out.println(String.format("A media da turma foi %.2f",media));
		System.out.println(String.format("Alunos com notas iguais ou maiores que a media"));
		for (int i = 0; i < alunos.length; i++) {
			if(notas[i]>=media) {
				System.out.println(String.format("%s - %.2f", alunos[i],notas[i]));
			}
		}
			
	}

}
