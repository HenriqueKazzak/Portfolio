package net.intelie.challenges;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.stream.Collectors;

public class EventStoreList implements EventStore{

    /**
     * I chose implement a ArrayList, because can be a thread-save using Collections.synchronizedList.
     * My first idea was creat a LinkedList, because the memory allocation is better than ArrayList, but for access elements at middle have high cost
     * and for this application we need to have fast random access, and the ArrayList is better for this purpose. Also, I tried  LinkedHashSet, but the problem isn't clear if accepts duplicate values or not.
     * However, my final choice was ArrayList, of course  when reach in final of ArrayList, the Java Implementation make an Arrays.copyOf and have a high cost.
     * But, for this purpose and also need random access, ArrayList is an option
     */
    private final List<Event> eventList;

    /**
     * The constructor creat an instance of eventList
     */
    public EventStoreList() {
        this.eventList = Collections.synchronizedList(new ArrayList<Event>());
    }

    public List<Event> getEventList(){
        return this.eventList;
    }

    public Event getEvent(int index){
        return this.eventList.get(index);
    }

    /**
     * Count of all elements inside the eventList
     * @return int count of this.eventList
     */
    public int count(){
        return this.eventList.size();
    }

    /**
     * Insert a new event inside eventList
     * @param event to be inserted
     */
    @Override
    public synchronized void insert(Event event) {
        this.eventList.add(event);
    }

    /**
     * Remove all occurrence of an event by type
     * @param type of the Event.Type
     */
    @Override
    public void removeAll(String type) {
        this.eventList.removeIf(
                (Event e)->e.type()
                        .equals(type)
        );

    }

    /**
     *
     * @param type      The type we are querying for.
     * @param startTime Start timestamp (inclusive).
     * @param endTime   End timestamp (exclusive).
     * @return an EventIterator of the query.
     */
    @Override
    public EventIterator query(String type, long startTime, long endTime) {
        return new EventIteratorClass(this.eventList.stream()
            .filter(event -> event.type().equals(type))
            .filter(event -> event.timestamp() > startTime)
            .filter(event -> event.timestamp() < endTime)
            .collect(Collectors.toList())
        );
    }
}
