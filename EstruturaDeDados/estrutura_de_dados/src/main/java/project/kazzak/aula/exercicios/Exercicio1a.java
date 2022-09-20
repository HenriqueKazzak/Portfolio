package project.kazzak.aula;

import java.util.Arrays;
import java.util.Collections;

public class Exercicio1a {
    public static void main(String [] args) {
        Integer [] a = new Integer [10];

        for(int i = 10; i > 0;i--){
            a[i-1]=i;
        }
        Arrays.sort(a, Collections.reverseOrder());
        for (int v: a) {
            System.out.println(v);
        }
    }
}
