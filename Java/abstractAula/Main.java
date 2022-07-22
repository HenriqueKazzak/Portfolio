package abstractAula;

public class Main {
    public static void main(String[] args) {
        Retangulo r = new Retangulo(10, 5);
        System.out.println(r.calculaArea()+"\n");   
        Circulo c = new Circulo(5);
        System.out.println(c.calculaArea()+"\n");
        Triangulo t = new Triangulo(10, 5);
        System.out.println(t.calculaArea()+"\n");
        System.out.println(t.toString());

    }
    
}
