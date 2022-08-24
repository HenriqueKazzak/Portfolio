//classe com desenhos de letras pre definidos
public abstract class Desenhos {

    public void desenhar(String desenho, char cor, char background) {
        switch (desenho) {
            case "C":
                desenharC(cor, background);
                break;
            /*case "E":
                desenharE(cor, background);
                break;
            case "F":
                desenharF(cor, background);
                break;
            case "H":
                desenharH(cor, background);
                break;
            case "I":
                desenharI(cor, background);
                break;
            case "P":
                desenharP(cor, background);
                break;*/
            case default:
                System.out.println("Desenho não encontrado");
                break;
        }
    }
    public void desenharC(char cor, char background) {
        this.pixels[0][0].setBackground(background);
        this.pixels[0][1].setColor(cor);
        this.pixels[0][2].setColor(cor);
        this.pixels[0][3].setColor(cor);
        this.pixels[0][4].setColor(cor);
        this.pixels[0][5].setBackground(background);
        this.pixels[1][0].setBackground(background);
        this.pixels[1][1].setColor(cor);
        this.pixels[1][2].setBackground(background);
        this.pixels[1][3].setBackground(background);
        this.pixels[1][4].setBackground(background);
        this.pixels[1][5].setBackground(background);
        this.pixels[2][0].setBackground(background);
        this.pixels[2][1].setColor(cor);
        this.pixels[2][2].setBackground(background);
        this.pixels[2][3].setBackground(background);
        this.pixels[2][4].setBackground(background);
        this.pixels[2][5].setBackground(background);
        this.pixels[2][0].setBackground(background);
    }

}
