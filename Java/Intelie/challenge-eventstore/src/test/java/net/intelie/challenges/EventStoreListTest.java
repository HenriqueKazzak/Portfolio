package net.intelie.challenges;

import org.junit.Assert;
import org.junit.Test;


//All passed
public class EventStoreListTest {
    EventStoreList eventList = new EventStoreList();
    Event event;

    @Test
    public void creatEventList() throws Exception{
        this.eventList = new EventStoreList();
        Assert.assertNotNull(eventList);
    }

    @Test
    public void creatEvent() throws Exception{
        this.event = creatNewEvent("some_type",1L);
        Assert.assertEquals("some_type",this.event.type());
        Assert.assertEquals(1L,this.event.timestamp());
    }

    @Test
    public void addEvent() throws Exception{
        eventList.insert(this.event);
        Assert.assertEquals(1,eventList.count());
    }

    @Test //RemoveAll without type in store
    public void removeAllNonExistTest() throws Exception {
        eventList.insert(creatNewEvent("some_type",3L));
        this.eventList.removeAll("other_type");
        Assert.assertEquals(1, eventList.count());
    }

    @Test //removeAll with Type in store
    public void removeAllTest() throws Exception {
        this.eventList.removeAll("some_type");
        Assert.assertEquals(0, eventList.count());
    }
    public Event creatNewEvent(String type, Long time){
        return new Event(type,time);
    }

}