package project.kazzak;

import java.util.Collections;
import java.util.HashMap;
import java.util.Map;

public class canConstruct2 {

    public static void main(String... args){
        int x = solution("abc","abccba");

    }
    public static int solution(String a, String b) {
        Map<String,Integer> mapValues = new HashMap<String,Integer>();
        char[] charA = a.toCharArray();
        char[] charB = b.toCharArray();
        for(char c : charB ){
            if(a.contains(String.valueOf(c))){
                if(mapValues.containsKey(String.valueOf(c))){
                    mapValues.put(String.valueOf(c),mapValues.get(String.valueOf(c))+1);
                }
                else{
                    mapValues.put(String.valueOf(c),1);
                }
            }
        }
        Map<String,Integer> mapA = new HashMap<String,Integer>();
        for (char c : charA) {
            if(mapValues.containsKey(String.valueOf(c))){
                mapA.put(String.valueOf(c),mapValues.get(String.valueOf(c)));
            }
            else{
                mapA.put(String.valueOf(c),0);
            }
        }
        int r = Collections.min(mapA.values());
        return r;
    }
}