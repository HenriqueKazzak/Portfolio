
public abstract class Publicacao implements Imprimivel {
	private String autor, titulo;
	private int ano;
	
	public Publicacao(String autor, String titulo, int ano) {
		this.autor = autor;
		this.titulo = titulo;
		this.ano = ano;
	}

	public String getAutor() {
		return autor;
	}

	public void setAutor(String autor) {
		this.autor = autor;
	}

	public String getTitulo() {
		return titulo;
	}
	
	public void setTitulo(String titulo) {
		this.titulo = titulo;
	}

	public int getAno() {
		return ano;
	}

	public void setAno(int ano) {
		this.ano = ano;
	}

	//creat override method toString
	@Override
	public String toString() {
		return "Publicacao Titulo: " + this.titulo +" \nTipo: "+ getClass().getSimpleName() +"\n";
	}

	@Override
	public void imprimir() {
		System.out.println("Titulo: " + this.titulo + "\nAutor: " + this.autor + "\nAno: " + this.ano);
	}

}
