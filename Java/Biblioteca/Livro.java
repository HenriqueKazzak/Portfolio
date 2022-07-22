
import java.util.HashMap;
import java.util.Map;

public class Livro extends Publicacao {
    private Map<String, String> capitulosMap = new HashMap<String, String>();
    
    public Livro(String autor, String titulo, int ano) {
        super(autor, titulo, ano);
    }
    public Map<String, String> getCapitulosMap() {
        return capitulosMap;
    }
    public void setCapitulosMap(String titulo, String texto) {
        this.capitulosMap.put(titulo, texto);
    }

    



}

