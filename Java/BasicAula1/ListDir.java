package aula3;

import java.io.File;

public class ListDir {

    public static void main(String[] args) {
        File dir = new File(".");
        String[] arquivos = dir.list();
        for (String arquivo : arquivos) {
            System.out.println(arquivo);
        }
    }
    
}
