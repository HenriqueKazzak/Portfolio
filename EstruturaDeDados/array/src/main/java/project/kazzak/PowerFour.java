package project.kazzak;
public class PowerFour {
    public static void main(String... args){
        boolean x = isPowerOfFour(0);
    }
    public static boolean isPowerOfFour(int n) {

        return n % 4 == 0 || (n == 1);

    }
}
