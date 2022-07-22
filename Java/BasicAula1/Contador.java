package aula3;

import java.util.Scanner;

public class Contador {
    
    public static void main(String[] args) {
        
        Scanner teclado = new Scanner(System.in);
        System.out.println("Digite um numero: ");
        int numero1 = teclado.nextInt();
        int cont=0;
        while(cont <= numero1){
            System.out.println(cont);
            cont++;
        }
        teclado.close();
    }
}
