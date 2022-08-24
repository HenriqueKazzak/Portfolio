package project.kazzak.ReverseLinkedList;
import project.kazzak.palindrome.ListNode;

public class ReversedLinkedList {
    public static void main(String... args){
        ListNode head = new ListNode(1);
        int[] arr = {2,3,4,5,6,7,8,9};
        for (int i:arr) {
            ListNode next = new ListNode(i,head);
            head = next;
        }
        ListNode reverse = reverseList(head);
    }
    public static ListNode reverseList(ListNode head) {
        ListNode prev = null;

        while(head!=null){
            ListNode next = head.next;
            head.next = prev;
            prev = head;
            head = next;
        }
        return prev;

    }
}
