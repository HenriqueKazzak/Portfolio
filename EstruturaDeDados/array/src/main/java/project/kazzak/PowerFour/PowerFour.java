package project.kazzak.PowerFour;
public class PowerFour {
    public static void main(String... args){
        boolean x = isPowerOfFour(16);
    }
    public static boolean isPowerOfFour(int n) {

        return (Math.log10(n)/Math.log10(4))%1==0;

    }
}
