package project.kazzak;

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
        int sumL = 0;
        int sumR = 0;
        for(int i = 0;i<nums.length;i++){
            sumL+=nums[i];
            if(sumR==sumL){
                return i;
            }
            sumR+=nums[nums.length-i-1];
        }
        return sumL;
    }
}
