
import java.util.Scanner;

public class SistemaBiblioteca {

	private Biblioteca biblioteca;

	private Scanner teclado;

	public SistemaBiblioteca() {
		biblioteca = new Biblioteca();
		teclado = new Scanner(System.in);
	}

	public void iniciarSistema(){
		int op = -1;
		while(op != 0){
			op = menuPrincipal();
			switch(op){
			case 1:
				adicionarPublicacao();
				break;
			case 2:
				biblioteca.listarAcervo();
				break;
			case 3:
				imprimirPublicacao();
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

	private void imprimirPublicacao() {
		if(biblioteca.getQuantidadeLivros() > 0){
			System.out.println("Digite a posição: ");
			int pos = Integer.parseInt(teclado.nextLine());
			biblioteca.imprimirItem(biblioteca.getPublicacao(pos-1));
		}else{
			System.out.println("\nNão há publicações cadastradas!\n");
		}
	}

	private void adicionarPublicacao() {
		int op = -1;
		do{
			op = menuPublicacao();
			switch(op){
			case 1:
				adicionarLivro();
				break;
			case 2:
				adicionarArtigo();
				break;
			default:
				System.out.println("Opção inválida");
				break;
			}
		}while( ! (op == 1 ||op ==2 ));
	}

	private void adicionarArtigo() {
		// (2 pontos) implementar
		//Adicionar um artigo a biblioteca
		Artigo artigo = criarArtigo();
		int op = menuSessaoArtigo();
		while(op == 1){
			artigo = criarSessoesArtigo(artigo);
			op = menuSessaoArtigo();
		}
		adicionarNoAcervo(artigo);
	}

	private void adicionarLivro() {
		// (2 pontos) implementar
		//Adicionar um livro a biblioteca
		Livro livro = criarLivro();
		int op = menuCapituloLivro();
		while(op == 1){
			livro = criarCapituLivro(livro);
			op = menuCapituloLivro();
		}
		adicionarNoAcervo(livro);
	}

	public int menuPrincipal(){
		System.out.println("---------------MENU-----------------");
		System.out.println("  1 - Adicionar Publicação");
		System.out.println("  2 - Listar Acervo");
		System.out.println("  3 - Imprimir Publicação");
		System.out.println("  0 - Sair");
		System.out.println("------------------------------------");
		System.out.println("Digite opção:");
		int op = Integer.parseInt(teclado.nextLine());
		return op;
	}

	public int menuPublicacao(){
		System.out.println("---------------MENU-----------------");
		System.out.println("  1 - Adicionar Livro");
		System.out.println("  2 - Adicionar Artigo");
		System.out.println("------------------------------------");
		System.out.println("Digite opção:");
		int op = Integer.parseInt(teclado.nextLine());
		return op;
	}
	//---------------------------------------------------------------------------------------------------------------------
	//--------Menu Artigo----------------------------------------------------------------------------------------------------
	//cria um artigo
	public Artigo criarArtigo(){
		System.out.println("Digite o título: ");
		String titulo = teclado.nextLine();
		System.out.println("Digite o autor: ");
		String autor = teclado.nextLine();
		System.out.println("Digite o ano: ");
		int ano = Integer.parseInt(teclado.nextLine());
		Artigo artigo = new Artigo(autor, titulo, ano);
		return artigo;
	}
	//cria uma sessao de artigo
	public Artigo criarSessoesArtigo(Artigo artigo){
			System.out.println("Digite o título da sessão: ");
			String tituloSessao = teclado.nextLine();
			System.out.println("Digite o texto da sessão: ");
			String textoSessao = teclado.nextLine();
			artigo.setCapitulosMap(tituloSessao, textoSessao);
			return artigo;
	}	
	//imprime na tela o menu para adicionar ou sair da parte de adicionar uma secao de artigo
	public int menuSessaoArtigo(){
		System.out.println("---------------SEÇÃO-----------------");
		System.out.println("  1 - Adicionar Sessão");
		System.out.println("  0 - Sair");
		System.out.println("------------------------------------");
		System.out.println("Digite opção:");
		int op = Integer.parseInt(teclado.nextLine());
		if(op != 1 && op != 0){
			System.out.println("Opção inválida");
			op = menuSessaoArtigo();
		}
		return op;
	}
	//--------Menu livro--------
	//cria um livro
	public Livro criarLivro(){
		System.out.println("Digite o título: ");
		String titulo = teclado.nextLine();
		System.out.println("Digite o autor: ");
		String autor = teclado.nextLine();
		System.out.println("Digite o ano: ");
		int ano = Integer.parseInt(teclado.nextLine());
		Livro livro = new Livro(autor, titulo, ano);
		return livro;
	}
	//cria um capitulo de um livro
	public Livro criarCapituLivro(Livro livro){
		System.out.println("Digite o título do capítulo: ");
		String tituloCapitulo = teclado.nextLine();
		System.out.println("Digite o texto do capítulo: ");
		String textoCapitulo = teclado.nextLine();
		livro.setCapitulosMap(tituloCapitulo, textoCapitulo);
		return livro;
	}
	//imprime na tela o menu para adicionar ou sair da parte de adicionar um capitulo de um livro
	public int menuCapituloLivro(){
		System.out.println("---------------CAPITULO-----------------");
		System.out.println("  1 - Adicionar Capitulo");
		System.out.println("  0 - Sair");
		System.out.println("------------------------------------");
		System.out.println("Digite opção:");
		int op = Integer.parseInt(teclado.nextLine());
		if(op != 1 && op != 0){
			System.out.println("Opção inválida");
			op = menuCapituloLivro();
		}
		return op;
	}
	//---------------------------------------------------------------------------------------------------------------------
	//--------Adicionar um livro ou artigo a biblioteca--------
	public void adicionarNoAcervo(Publicacao publicacao){
		biblioteca.adicionar(publicacao);
	}
}

