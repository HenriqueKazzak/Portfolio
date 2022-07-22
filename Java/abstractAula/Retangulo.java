package abstractAula;

public class Retangulo extends Poligno {
    private float base;
    private float altura;
    
    public Retangulo(float base, float altura){
        this.base = base;
        this.altura = altura;
    }
    @Override
    public float calculaArea(){
        return base * altura;
    }

    
}
