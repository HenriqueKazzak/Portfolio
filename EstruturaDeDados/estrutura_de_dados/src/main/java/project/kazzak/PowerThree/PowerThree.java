package project.kazzak.PowerThree;

public class PowerThree {
    public static void main(String... args){
        boolean x = isPowerOfThree(16);
    }
    public static boolean isPowerOfThree(int n) {

        return (Math.log10(n)/Math.log10(4))%1==0;

    }
}
