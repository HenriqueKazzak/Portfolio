package project.kazzak.aula.atividadeListaEncadeada;
import java.util.LinkedList;

import static project.kazzak.aula.atividadeListaEncadeada.Class.UtilsLinkedList.*;


public class Exercicio7 {
    public static void main(String[] args) {
        int elements = 10;
        LinkedList<Integer> integerLinkedListA= IntegerLinkedList(100,10);
        LinkedList<Integer> integerLinkedListB= IntegerLinkedList(5,10);
        System.out.println(integerLinkedListA);
        System.out.println(integerLinkedListB);
        System.out.println(intersectionLinkedList(integerLinkedListA,integerLinkedListB));
    }
}
