package abstractAula;

public class Circulo extends Poligno {
    private float raio;

    public Circulo(float raio) {
        this.raio = raio;
    }
    @Override
    public float calculaArea(){
        return (float) (Math.PI * Math.pow(raio, 2));
    }
    public float calculaPerimetro(){
        return (float) (2 * Math.PI * raio);
    }
    public float getDiametro(){
        return raio * 2;
    }
    
}
