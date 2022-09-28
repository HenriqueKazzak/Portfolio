package project.kazzak.aula.atividadeListaEncadeada.Class;

import java.util.LinkedList;
import java.util.Random;
import java.util.concurrent.atomic.AtomicReference;

public class UtilsLinkedList {

    private static Random random;
    static {
        random = new Random();
    }

    public static LinkedList<Integer> IntegerLinkedList(int maxRandom, int NumElements){
        LinkedList<Integer> integerLinkedList = new LinkedList<>();
        for (int i = 0; i < NumElements; i++) {
            integerLinkedList.add(random.nextInt(maxRandom));
        }
        return integerLinkedList;
    }

    public static Integer getMaxInteger(LinkedList<Integer> linkedList){
        AtomicReference<Integer> max = new AtomicReference<>(0);
        linkedList.forEach((Integer i) -> {
            if(i.compareTo(max.get())>0){
                max.set(i);
            }
        });
        return max.get();
    }
    public static LinkedList<Integer> reverseLinkedList(LinkedList<Integer> integerLinkedList){
        LinkedList<Integer> reversedLinkedList = new LinkedList<>();
        for (int i = 0; i < integerLinkedList.size(); i++) {
            reversedLinkedList.addFirst(integerLinkedList.get(i));
        }
        return reversedLinkedList;
    }

    public static LinkedList<Integer>distinct(LinkedList<Integer> integerLinkedList){
        for (int i = 0; i < integerLinkedList.size(); i++) {
            for (int j = 0; j < integerLinkedList.size(); j++) {
                if (i!=j && integerLinkedList.get(j) == integerLinkedList.get(i)){
                    integerLinkedList.remove(j);
                }
            }
        }
        return integerLinkedList;
    }

}
