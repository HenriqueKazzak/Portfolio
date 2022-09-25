package net.intelie.challenges;

import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.*;

public class EventIteratorClassTest {

    private EventStoreList eventStoreList;

    @Before
    public void setUp() {
        this.eventStoreList = new EventStoreList();
        for (int i = 0; i < 100 ; i++) {
            if (i%2==0){
                this.eventStoreList.insert(new Event("Event_even",i));
            }
            else{
                this.eventStoreList.insert(new Event("Event_odd",i));
            }
        }
    }

    //Pass
    @Test
    public void sizeTest() {
        EventIterator iterator = this.eventStoreList.query("Event_even",0,20);
        //2,4,6,8,10,12,14,16,18
        assertEquals(9,iterator.size());
    }

    //Pass
    @Test
    public void moveNext() {
        EventIterator iterator = this.eventStoreList.query("Event_even",0,10);
        iterator.moveNext();
        Event current = this.eventStoreList.getEventList().get(0);
        Event currentIt = iterator.current();
        assertEquals(currentIt,currentIt);
    }

    //Pass
    @Test(expected = IllegalStateException.class)
    public void moveNextWithOutNext() {
        EventIterator iterator = this.eventStoreList.query("Event_even",0,0);
        iterator.moveNext();
    }

    //Pass
    @Test
    public void current() {
        EventIterator iterator = this.eventStoreList.query("Event_odd",3,41);
        //5, 7, 11, 13, 17, 19, 23, 29, 31, 37
        iterator.moveNext();//5
        iterator.moveNext();//7
        iterator.moveNext();//9
        iterator.moveNext();//11
        iterator.moveNext();//13
        iterator.moveNext();//15
        iterator.moveNext();//17
        System.out.println(this.eventStoreList.getEvent(17).timestamp());
        assertEquals(this.eventStoreList.getEvent(17),iterator.current());
    }

    //Pass
    @Test(expected = IllegalStateException.class)
    public void currentWithOutNext() {
        EventIterator iterator = this.eventStoreList.query("Event_odd",0,63);
        Event currentIt = iterator.current();
    }

    //Pass
    @Test
    public void remove() {
        EventIterator iterator = this.eventStoreList.query("Event_even",0,4);
        iterator.moveNext();
        iterator.remove();
        assertEquals(0,iterator.size());
    }

    //Pass
    @Test(expected = IllegalStateException.class)
    public void removeWithOutMoveNext() {
        EventIterator iterator = this.eventStoreList.query("Event_odd",0,2);
        iterator.remove();
    }

    //Pass
    @Test
    public void close() throws Exception {
        EventIterator iterator = this.eventStoreList.query("Event_odd",0,100);
        iterator.close();
    }
}