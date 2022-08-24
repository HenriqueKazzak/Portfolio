package project.kazzak.palindrome;

public class Palindrome {
    public static void main(String... args){
        ListNode head = new ListNode(1);
        int[] arr = {2,3,3,2,1};
        for (int i:arr) {
            ListNode next = new ListNode(i,head);
            head = next;
        }
        boolean x = isPalidrome(head);

    }

    public static boolean isPalidrome(ListNode head) {
        ListNode slow = head;
        ListNode fast = head;

        while (fast != null && fast.next != null) {
            fast = fast.next.next;
            slow = slow.next;
        }
        slow = reversed(slow);
        fast=head;
        while (slow !=null){
            if(slow.val != fast.val){
                return false;
            }
            fast=fast.next;
            slow=slow.next;
        }
        return true;
    }

    private static ListNode reversed(ListNode head) {
        ListNode prev = null;
        while (head!=null){
            ListNode next = head.next;
            head.next = prev;
            prev = head;
            head=next;
        }
        return prev;
    }
}
