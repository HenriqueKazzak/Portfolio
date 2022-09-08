package project.kazzak;

public class Exercicio1c {
    public static void main(String... args){
        int[]c=new int[10];
        for (int i = 0; i < 10; i++) {
            c[i] = i+1 <= 5?i+1:c[i-5]*10;
        }
        for (int i:c) {
            System.out.println(i);
        }

    }
}
