package project.kazzak.aula.atividadeListaEncadeada;

import java.util.LinkedList;

import static project.kazzak.aula.atividadeListaEncadeada.Class.UtilsLinkedList.*;

public class Exercicio4 {
    public static void main(String[] args) {
        int elements = 9;
        LinkedList<Integer> integerLinkedList = IntegerLinkedList(100,elements);
        System.out.println(String.format("Ordem normal: \n%s",integerLinkedList.toString()));
        for (int i = 0; i < (integerLinkedList.size()/2); i++) {
            Integer tempItem = integerLinkedList.get(i);
            integerLinkedList.set(i,integerLinkedList.get(integerLinkedList.size()-1-i));
            integerLinkedList.set(integerLinkedList.size()-1,tempItem);
        }
        System.out.println(String.format("ReversoL\n%s",integerLinkedList.toString()));
    }
}
