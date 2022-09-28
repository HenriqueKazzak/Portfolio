package project.kazzak.aula.atividadeListaEncadeada;

import static project.kazzak.aula.atividadeListaEncadeada.Class.UtilsLinkedList.*;

import java.util.LinkedList;

public class Exercicio1 {

    public static void main(String[] args) {
        int intElements = 15;
        LinkedList<Integer> integerLinkedList = IntegerLinkedList(100,intElements);
        LinkedList<Integer> integerLinkedListK = new LinkedList<>();

        while (integerLinkedListK.size()<=15){
            System.out.println(String.format("--Rodada %d--\nLista L: %s -- Maior Valor em L: %d\nLista K: %s",
                    1+intElements-integerLinkedList.size(),
                    integerLinkedList.toString(),
                    getMaxInteger(integerLinkedList),
                    integerLinkedListK.toString()
            ));
            integerLinkedListK.addFirst(getMaxInteger(integerLinkedList));
            integerLinkedList.remove(getMaxInteger(integerLinkedList));
        }
    }
}
