import java.util.ArrayList;

//resumo, titulo, autor, numPaginas e uma lista com as palavras-chave.

public class Livro {
    private String titulo;
    private String autor;
    private int numPaginas;
    private ArrayList<String> palavrasChave = new ArrayList<String>();

    public Livro(String titulo, String autor, int numPaginas, ArrayList<String> palavrasChave) {
        this.titulo = titulo;
        this.autor = autor;
        this.numPaginas = numPaginas;
        this.palavrasChave = palavrasChave;
    }
    public Livro(){

    }
    //getters e setters
    public String getTitulo() {
        return titulo;
    }
    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }
    public String getAutor() {
        return autor;
    }
    public void setAutor(String autor) {
        this.autor = autor;
    }
    public int getNumPaginas() {
        return numPaginas;
    }
    public void setNumPaginas(int numPaginas) {
        this.numPaginas = numPaginas;
    }
    public ArrayList<String> getPalavrasChave() {
        return palavrasChave;
    }
    public void setPalavrasChave(ArrayList<String> palavrasChave) {
        for (int i = 0; i < palavrasChave.size(); i++) {
            this.palavrasChave.add(palavrasChave.get(i));
        }
    }

}
