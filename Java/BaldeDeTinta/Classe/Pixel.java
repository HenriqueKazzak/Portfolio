public class Pixel {
    private char color;
    private char background;
    
    public Pixel() {
    }
    
    public void setColor(char color) {
        this.color = color;
    }
    
    public void setBackground(char background) {
        this.background = background;
    }
    
    public char getColor() {
        return this.color;
    }
    
    public char getBackground() {
        return this.background;
    }

    @Override
    public String toString() {
        return color + "";
    }
}
