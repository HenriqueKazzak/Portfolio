package project.kazzak;
/*Exercício 1: Para cada conjunto de valores abaixo, escreva o código Java, usando laço(s), que
preencha um array com os valores:
   0 1 2  3   4   5   6    7   8  9
d) 3 4 7 12  19  28   39  52  67 84
   1 3 5  7   9  11   13  15  17 19

   */
public class Exercicio1d {
    public static void main(String... args){
        Integer[] d = new Integer[10];
        for (int i = 0; i <10 ; i++) {
            d[i]=i==0?3:i==1?d[i-1]+1:((d[i-1]-d[i-2])+2)+d[i-1];
        }
        for (Integer v: d) {
            System.out.println(v);

        }
    }
}