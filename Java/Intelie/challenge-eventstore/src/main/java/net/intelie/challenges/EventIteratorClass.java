package net.intelie.challenges;

import java.util.Collections;
import java.util.List;

public class EventIteratorClass implements EventIterator {

    private Event currentEvent;
    private int currentSize;
    private int currentIndex = -1;
    private List<Event> eventList;
    private boolean calledMoveNext;

    /**
     * Constructor
     * @param events receive a List of Event
     */
    public EventIteratorClass(List<Event> events) {
        this.eventList = Collections.synchronizedList(events);
        currentSize = events.size();
    }

    /**
     * Move the iterator to the next event, if any.
     *
     * @return false if the iterator has reached the end, true otherwise.
     */
    @Override
    public boolean moveNext() {
        this.calledMoveNext = true;
        try {
            if(hasNext()){
                this.currentIndex++;
                this.currentEvent=this.eventList.get(this.currentIndex);
                return true;
            }
            this.currentEvent = null;
        }
        catch (IndexOutOfBoundsException e){
            throw new IndexOutOfBoundsException();
        }
        return false;
    }

    /**
     * Gets the current event referred by this iterator.
     *
     * @return the event itself.
     * @throws IllegalStateException if {@link #moveNext} was never called
     *                               or its last result was {@code false}.
     */
    @Override
    public Event current() {
        if (this.calledMoveNext){
            return this.currentEvent;
        }
        else {
            throw new IllegalStateException("Called 'current' without 'moveNext' method before.");
        }
    }

    /**
     * remove the current event referred by this iterator.
     *
     * @throws IllegalStateException if {@link #moveNext} was never called
     *                               or its last result was {@code false}.
     */
    @Override
    public void remove() {
        if (this.calledMoveNext){
            this.eventList.remove(currentIndex);
            this.currentSize = this.eventList.size();
            this.currentIndex--;
            this.calledMoveNext = false;
        }
        else {
            throw new IllegalStateException("Called 'remove' without 'moveNext' method before.");
        }

    }

    /**
     * Get the size of eventList
     * @return an int with the size.
     */

    @Override
    public int size(){
        return this.currentSize;
    }

    @Override
    public void close() throws Exception {
        eventList = null;
    }

    /**
     * Check if had next element in array
     * @return true if had or false if hadn't
     * @throws IllegalStateException if the next element don't exist
     */
    public boolean hasNext(){
        try {
            return  currentIndex < currentSize && this.eventList.get(this.currentIndex+1) !=null;
        }
        catch (IndexOutOfBoundsException e){
            throw new IllegalStateException(String.format("The index of eventList is %d and was request index %d",this.currentSize,this.currentIndex+1));
        }
    }


}
