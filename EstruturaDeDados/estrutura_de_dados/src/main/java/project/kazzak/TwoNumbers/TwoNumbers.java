class TwoNumbers {
    public static void main(String[] args) {
        int [] arr = {2,3,4};
        int target = 5;
        int [] result = twoSum(arr, target);
        System.out.println(result[0] + " " + result[1]);
    }
    public static int[] twoSum(int[] nums, int target) {
        for (int i = 0;i<nums.length;i++){
            for(int j = i+1;j<nums.length;j++){
                if(nums[i]+nums[j] == target){
                    return new int []{i,j};
                }
            }
        }
        return new int []{-1,-1};
    }
}