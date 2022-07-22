import java.util.ArrayList;

public class CatalogoLivros {
	private ArrayList<Livro> livros = new ArrayList<Livro>();
	
	public int getQuantidadeLivros(){
		return this.livros.size();			
	}
	
	public boolean adicionar(Livro novoLivro){
		this.livros.add(novoLivro);
		return true;
	}
	
	public boolean remover(int posicao){
		this.livros.remove(posicao);
		return true;
	}
	
	private void imprimirDadosLivro(int i) {
		System.out.println("Titulo: " + this.livros.get(i).getTitulo() + "\nAutor: " + this.livros.get(i).getAutor() + "\nNumero de Paginas: " + this.livros.get(i).getNumPaginas() + "\nPalavras chave: " + this.livros.get(i).getPalavrasChave());
		System.out.println("\n");
	}
	
	public void imprimirLivros() {
		for (int i = 0; i < this.livros.size(); i++) {
			imprimirDadosLivro(i);
		}
	}
	
}
