package project.kazzak.aula.atividadeListaEncadeada.Class;

import java.util.LinkedList;
import java.util.Random;
import java.util.concurrent.atomic.AtomicReference;
import java.util.stream.Collectors;

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
        LinkedList<Integer> newlinkedList = new LinkedList<>();
        for (Integer item:integerLinkedList) {
            if (!newlinkedList.contains(item)){
                newlinkedList.add(item);
            }
        }
        return newlinkedList;
    }

    public static LinkedList<Integer>unionLinkedList(LinkedList<Integer>aLinkedList, LinkedList<Integer>bLinkedList){
        LinkedList<Integer> returnLinkedList = new LinkedList<>();
        returnLinkedList.addAll(aLinkedList);
        returnLinkedList.addAll(bLinkedList);
        return returnLinkedList;
    }

    public static LinkedList<Integer>intersectionLinkedList(LinkedList<Integer>aLinkedList, LinkedList<Integer>bLinkedList){
        LinkedList<Integer>unionLL = unionLinkedList(aLinkedList,bLinkedList);
        unionLL.removeIf((Integer i )->(!aLinkedList.contains(i))||(!bLinkedList.contains(i)));
        return unionLL;
    }
    public static LinkedList<Integer>DiffLinkedList(LinkedList<Integer>aLinkedList, LinkedList<Integer>bLinkedList){
        LinkedList<Integer>unionLL = unionLinkedList(aLinkedList,bLinkedList);
        unionLL.removeIf((Integer i )->aLinkedList.contains(i)&&bLinkedList.contains(i));
        return unionLL;
    }

}
