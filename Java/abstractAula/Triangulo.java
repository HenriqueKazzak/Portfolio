package abstractAula;

public class Triangulo extends Poligno {
    private float base;
    private float altura;

    public Triangulo(float base, float altura) {
        this.base = base;
        this.altura = altura;
    }
    @Override
    public float calculaArea(){
        return base * altura / 2;
    }

    public String toString(){
        return "Triangulo de base " + base + " e altura " + altura;
    }
    
}
