import java.util.Scanner;
public class Paint extends Desenhos {
    private Pixel[][] pixels;
    private int width;
    private int height;

    public Paint() {
        this.width = 6;
        this.height = 4;
        this.pixels = new Pixel[width][height];
        for (int i = 0; i < this.pixels.length; i++) {
            for (int j = 0; j < this.pixels[i].length; j++) {
                this.pixels[i][j] = new Pixel();
            }
        }
    }
    public void paint() {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Selecione uma letra das opções abaixo:\nC\nE\nF\nH\nI\nP");
        String letra = scanner.nextLine();
        System.out.println("Digite UM caracter para ser uma cor");
        char cor = scanner.nextLine().charAt(0);
        System.out.println("Digite UM caracter para ser um background");
        char background = scanner.nextLine().charAt(0);
        scanner.close();
        this.desenhar(letra, cor, background);
    }
    

}
