package project.kazzak.aula.atividadeListaEncadeada;

import java.util.LinkedList;
import static project.kazzak.aula.atividadeListaEncadeada.Class.UtilsLinkedList.*;

public class Exercicio6 {
    public static void main(String[] args) {
        int elements = 9;
        LinkedList<Integer> integerLinkedList = IntegerLinkedList(5,elements);
        System.out.println(String.format("Lista normal: \n%s\nLista sem repetido\n%s",integerLinkedList.toString(),distinct(integerLinkedList).toString()));
    }
}
