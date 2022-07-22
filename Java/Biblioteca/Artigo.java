import java.util.Map;
import java.util.HashMap;
//Artigo extends Publicacao contem chave valor titulo e texto
public class Artigo extends Publicacao {
    private Map<String, String> sessoesMap = new HashMap<String, String>();
    
    public Artigo(String autor, String titulo, int ano) {
        super(autor, titulo, ano);
    }
    public Map<String, String> getCapitulosMap() {
        return sessoesMap;
    }
    public void setCapitulosMap(String titulo, String texto) {
        this.sessoesMap.put(titulo, texto);
    }
// (2 pontos) implementar
	
}
