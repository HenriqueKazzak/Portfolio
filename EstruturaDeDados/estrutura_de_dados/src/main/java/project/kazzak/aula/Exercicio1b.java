package project.kazzak.aula;
public class Exercicio1b {
    public static void main(String... args){
        Integer[] b = new Integer[10];

        for (int i = 0; i < 9; i++) {
            if(i==0){
                b[i]=i;
            }
            b[i+1]=b[i]+((i+1)+i);
        }
        for (int n:b) {
            System.out.println(n);
        }
    }
}
