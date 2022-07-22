package aula3;

public class Soma {

    public static void main(String[] args) {

        String resultado = Integer.toString(Integer.parseInt(args[0]) + Integer.parseInt(args[1]));
        System.out.println(resultado);
    }
}