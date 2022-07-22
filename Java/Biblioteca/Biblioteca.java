
import java.util.ArrayList;

public class Biblioteca {

	ArrayList<Publicacao> publicacoes = new ArrayList<Publicacao>();

	public int getQuantidadeLivros(){
		return publicacoes.size();				
	}

	public void adicionar(Publicacao novaPublicacao){
		publicacoes.add(novaPublicacao);
	}
	
	public Publicacao getPublicacao(int item){
		return publicacoes.get(item);
	}

	public void listarAcervo() {
		// (2 pontos) implementar
		for(Publicacao publicacao : publicacoes){
			System.out.println(publicacao.toString());
		}
	}

	public void imprimirItem(Imprimivel publicacao) {
		publicacao.imprimir();	
	}

}
