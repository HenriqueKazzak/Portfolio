package project.kazzak.aula.exercicios;

import java.util.LinkedList;
import java.util.Queue;
import java.util.Scanner;
import java.util.Stack;

public class AtividadePilha {

    public static void main(String[] args) {
        int op = 1;
        Scanner scanner = new Scanner(System.in);
        Queue<String> stringQueue = new LinkedList<>();
        LinkedList<String> stringLinkedList = new LinkedList<>();
        Stack stringStack = new Stack<>();

        while (op==1){
            op = menuSistema(scanner);
            switch (op){
                case 1:
                    stringLinkedList.add((stringLinkedList.size()+1)+"-"+lerString("Digite a tarefa",scanner));
                    //stringStack.add(lerString("Digite a tarefa",scanner));
                    break;
                default:
                    break;
            }
        }
        stringStack.addAll(stringLinkedList);
        imprimirStak(stringStack);
        System.out.println("\n");
        stringQueue.addAll(stringLinkedList);
        imprimirQueue(stringQueue);
    }
    public static int menuSistema(Scanner scanner){
        Integer op = lerInt("[1] - Adicionar Tarefa\n[0] - Sair",scanner);
        //System.out.println(op);
        if (op != 0 && op != 1){
            System.out.println("Opcao invalida!\nPor favor tente novamente");
            menuSistema(scanner);
        }
        return op;
    }
    public static void imprimirStak(Stack<String> stack){
        System.out.println(stack.pop());
        if (stack.stream().count() > 0){
            imprimirStak(stack);
        }
    }

    public static void imprimirQueue(Queue<String> queue){
        System.out.println(queue.poll());
        if (queue.size()>0){
            imprimirQueue(queue);
        }
    }
    public static String lerString(String mensagem, Scanner scanner){
        System.out.println(mensagem);
        return scanner.nextLine();
    }
    public static int lerInt(String mensagem, Scanner scanner){
        System.out.println(mensagem);
        return Integer.parseInt(scanner.nextLine());
    }

}
