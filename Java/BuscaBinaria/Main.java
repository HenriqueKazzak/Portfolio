import java.util.Arrays;
import java.util.List;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        //criar um array de pessoas
        Pessoa[] lista = {
                    new Pessoa(1, "João"),
                    new Pessoa(2, "Maria"),
                    new Pessoa(3, "José"),
                    new Pessoa(4, "Pedro"),
                    new Pessoa(5, "Ana"),
                    new Pessoa(6, "Ze"),
                    new Pessoa(7, "Bia"),
                    new Pessoa(8, "Carlos"),
                    new Pessoa(9, "Daniel"),
                    new Pessoa(10, "Eduardo"),
                    new Pessoa(11, "Fernando"), 
                    new Pessoa(12, "Gustavo"),
                    new Pessoa(13, "Humberto"),
                    new Pessoa(14, "Iago"),
                    new Pessoa(15, "Kelly")
                };
        //ordenar o array
        Arrays.sort(lista);
        List <Pessoa> listaPessoasOrdenada = Arrays.asList(lista);
        
        //Busca Binaria
        //cronometro para medir o tempo de execução
        System.out.println("Busca Binaria\nQual Nome voce busca?");
        Scanner scanner = new Scanner(System.in);
        String nome = scanner.nextLine();
        scanner.close();

        long start = System.currentTimeMillis();
        int first = 0;
        int last = listaPessoasOrdenada.size() -1;
        int middle;
        
        while (first <= last) {
            middle = (int)(first + last) / 2;
            if (listaPessoasOrdenada.get(middle).getNome().equals(nome)) {
                System.out.println("Encontrado: " + listaPessoasOrdenada.get(middle).getNome() + " - Numero: " + listaPessoasOrdenada.get(middle).getNumber());
                break;
            } else if (listaPessoasOrdenada.get(middle).getNome().compareTo(nome) < 0) {
                first = middle + 1;
            } else {
                last = middle - 1;
            }
        }
        long end = System.currentTimeMillis();
        System.out.println("Tempo de execução: " + (end - start) + "ms");

    }
}

