package project.kazzak.aula.atividadeListaEncadeada;

import java.util.LinkedList;
import static project.kazzak.aula.atividadeListaEncadeada.Class.UtilsLinkedList.*;

public class Exercicio3 {
    public static void main(String[] args) {
        int elements = 15;
        LinkedList<Integer> integerLinkedList = IntegerLinkedList(100,elements);
        LinkedList<Integer> newLinkedList = reverseLinkedList(integerLinkedList);
        System.out.println(String.format("Ordem normal: \n%s\nOredem Reversa:\n%s",integerLinkedList, newLinkedList));
    }
}
