
public class Pessoa implements Comparable<Pessoa> {
    private String nome;
    private int number;

    public Pessoa( int number,String nome) {
        this.nome = nome;
        this.number = number;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public int getNumber() {
        return number;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    @Override
    public int compareTo(Pessoa o) {
        return this.nome.compareTo(o.getNome());
    }


}
