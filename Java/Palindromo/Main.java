import java.util.Scanner;
public class Main {
    public static void main(String[] args) {
        System.out.println("Digite uma palavra: ");
        Scanner scanner = new Scanner(System.in);
        String palavra = scanner.nextLine();
        scanner.close();
        System.out.println((palavra.toLowerCase().equals(new StringBuilder(palavra).reverse().toString().toLowerCase())? "É palindromo" : "Não é um palíndromo"));
    }
}
