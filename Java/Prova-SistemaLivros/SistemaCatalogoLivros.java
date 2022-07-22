
import java.util.ArrayList;
import java.util.Scanner;

public class SistemaCatalogoLivros {

	private CatalogoLivros catalogoLivros;
	private Scanner teclado;

	public SistemaCatalogoLivros() {
		catalogoLivros = new CatalogoLivros();
		teclado = new Scanner(System.in);
	}

	public void iniciarSistema(){
		int op = -1;
		while(op != 0){
			op = menuPrincipal();
			switch(op){
			case 1:
				adicionarLivro();
				break;
			case 2:
				catalogoLivros.imprimirLivros();
				break;
			case 3:
				removerLivro();
				
				break;
			case 0:
				System.out.println("Finalizando o sistema");
				break;
			default:
				System.out.println("Opção inválida");
				break;
			}
		}
	}

	private void removerLivro() {
		System.out.println("Digite a posicaoo do livro que ira remover");
		int posicao = Integer.parseInt(teclado.nextLine());
		catalogoLivros.remover(posicao);
		System.out.println("Livro removido com sucesso\nO catalogo possui " + catalogoLivros.getQuantidadeLivros() + " livros");
	}

	private void adicionarLivro() {
		//Captura dados do novo livro

		//Titulo
		System.out.println("Digite o título do livro: ");
		String titulo = teclado.nextLine();

		//Autor
		System.out.println("Digite o autor do livro: ");
		String autor = teclado.nextLine();

		//Numero de paginas
		System.out.println("Digite o número de páginas do livro: ");
		int numPaginas = Integer.parseInt(teclado.nextLine());

		//Palavras chave
					/*
						Por algum motivo de força oculta acontece esse erro quando usado esse metodo para add as palaves chaves: java.util.InputMismatchException 
					System.out.println("--------Menu de Palavras-chave--------\n[0] - Finalizar\n[1] - Adicionar palavra-chave\n");
					int op = -1;
					ArrayList<String> palavrasChaveList = new ArrayList<String>();
					while(op != 0){
						op = teclado.nextInt();
						switch(op){
						case 1:
							System.out.println("Digite a palavra-chave: ");
							palavrasChaveList.add(teclado.nextLine());
							break;
						default:
							System.out.println("Opção inválida");
							break;
						}
					}*/
		//Metodo de captura de palavras-chave, nao é o melhor mas funciona
		System.out.println("Digite as palavras-chave do livro separadas por virgula: ");
		String [] palavrasChave = teclado.nextLine().split(",");
		ArrayList<String> palavrasChaveList = new ArrayList<String>();
		for(String palavra : palavrasChave){
			palavrasChaveList.add(palavra);
		}
		//Fim captura dde dados do novo livro

		//Cria novo livro
		Livro novoLivro = new Livro(titulo, autor, numPaginas, palavrasChaveList);
		//Adicionar o livro ao catalogo
		catalogoLivros.adicionar(novoLivro);
		System.out.println("Livro adicionado com sucesso");
		System.out.println("O catalogo possui " + catalogoLivros.getQuantidadeLivros() + " livros");
	}

	public int menuPrincipal(){
		System.out.println("---------------MENU-----------------");
		System.out.println("  1 - Adicionar Livro");
		System.out.println("  2 - Imprimir Livros");
		System.out.println("  3 - Remover livro (por posição)");
		System.out.println("  0 - Sair");
		System.out.println("------------------------------------");
		System.out.println("Digite opção:");
		int op = Integer.parseInt(teclado.nextLine());
		return op;

	}

}
