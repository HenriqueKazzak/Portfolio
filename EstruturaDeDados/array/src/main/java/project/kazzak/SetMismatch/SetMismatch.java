package project.kazzak.SetMismatch;
//incomplete
/**
 * @author henrique.karmierczak
 *
 */

public class SetMismatch {
    public static void main(String... args){
        int[] nums = {1,2,2,4};
        int[] result = findErrorNums(nums);

    }

    /**
     *
     * @param nums an array of int started by 1 to n
     * @returnFind the number that occurs twice and the number that is missing and return them in the form of an array.
     *
     */
    public static int[] findErrorNums(int[] nums) {
        StringBuilder result = new StringBuilder("");
        for (int i = 0; i < nums.length; i++) {
            if (nums[i] != i+1){
                result.append(i & i+1);
            }
        }
        return null; //result.toString().split(",");
    }
}
