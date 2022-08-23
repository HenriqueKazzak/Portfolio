package project.kazzak;

/**
 * @author henrique.karmierczak
 */
public class FindConsecutiveThreeInt{
    /**
     *
     * @param args Is array of String with args for execution
     */
    public static void main(String... args){
        long[] x = sumOfThree(33);
    }

    /**
     *
     * @param num A long number what the function will determine if you can be a sum of three integer.
     * @return An array with the sequential numbers, when sum will be the number
     */
    public static long[] sumOfThree(long num) {
        return (num%3==0)? new long[]{(num/3)-1,(num/3),((num/3)+1)}: new long[]{};
    }
}
