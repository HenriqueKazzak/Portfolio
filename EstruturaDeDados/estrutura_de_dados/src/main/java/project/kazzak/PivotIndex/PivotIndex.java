package project.kazzak.PivotIndex;

import java.util.Arrays;

public class PivotIndex {
    public static void main(String... args){
        int x = pivotIndex(new int[]{1,7,3,6,5,6});
    }

    /**
     *
     * @param nums an array with integer number
     * @return return the pivoindex where sum of all left and all right is the same
     */
    public static int pivotIndex(int[] nums) {
        int sum = 0, leftsum = 0;
        for (int x: nums) sum += x;
        for (int i = 0; i < nums.length; ++i) {
            if (leftsum == sum - leftsum - nums[i]) return i;
            leftsum += nums[i];
        }
        return -1;
    }
}
