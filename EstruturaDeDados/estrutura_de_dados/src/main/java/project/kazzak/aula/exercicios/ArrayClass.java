package project.kazzak.aula;

import org.apache.commons.lang3.StringUtils;

import java.util.Arrays;

/**
 * Esta classe define um arra de int
 * @author henrique.karmierczak
 *
 */


public class ArrayClass {

    private int itens;
    private int[] arr;

    /**
     * Constroi a classe com os parametros default
     * @param items inicializa em 0, um count de itens adicionados em arr
     * @param arr inicializa o arr da classe, por padrao é 10 e dobra quando atinge o limite
     */
    public ArrayClass(){
        this.itens=0;
        this.arr=new int[10];
    }
    public void addInt(int n){
        this.arr[this.itens]=n;
        this.itens++;
        if (this.itens == this.arr.length-1){
            this.arr = Arrays.copyOf(this.arr,this.arr.length*2);
        }
    }
    public String getArr(){
        return StringUtils.join( this.arr,',');
    }
    public int getMedia(){
        return getSoma()/this.itens;
    }

    public int getSoma() {
        int soma = 0;
        for (int i = 0; i < this.itens; i++) {
            soma+=this.arr[i];
        }
        return soma;
    }
    public int getTamanho(){
        return this.itens;
    }

    @Override
    public String toString(){
        return String.format("Soma: %s\nMedia:%s\nValores: %s",getSoma(),getMedia(),getArr());
    }

    public static void  main(String... args){
        ArrayClass vetor = new ArrayClass();
        for (int i = 0; i < 20; i++) {
            vetor.addInt(i);
        }
        System.out.println(vetor);
    }

}
