package project.kazzak.aula.atividadeListaEncadeada;

import static project.kazzak.aula.atividadeListaEncadeada.Class.UtilsLinkedList.*;
import java.util.LinkedList;
import java.util.Scanner;


public class Exercicio2 {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int max=15;
        LinkedList<Integer> integerLinkedList = IntegerLinkedList(100,max);
        System.out.println(String.format("Digie o numero para remover: %s\n",integerLinkedList.toString()));
        Integer integerToRemove =  Integer.valueOf(scanner.nextLine());

        Integer removedInteger = integerLinkedList.remove(integerLinkedList.indexOf(integerToRemove));
        System.out.println(integerLinkedList.toString());
    }

}
