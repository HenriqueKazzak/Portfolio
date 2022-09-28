package project.kazzak;

import java.awt.*;
import java.util.*;

public class AmazonSDEI {

    public static void main(String... args) {

        String[] teste = new String[]{
        "bag",
        "red",
        "cbh",
        "cbh",
        "dci",
        "edj",
        "sfe"};

        System.out.println(countFamilyLogins(teste));
    }

    public static final String alphabet = "abcdefghijklmnopqrstuvwxyz";
    public static int countFamilyLogins(String[] logins) {
        Arrays.sort(logins);
        Integer result = 0;
        int a = 0;
        for (int i = 0; i < logins.length; i++) {
            String right = getRight(logins[i]);
           //String left = getLeft(logins[i]);
            for (int j = i+1; j < logins.length; j++) {
                if (i!=j){
                    a++;
                }
                if (i!=j && (isPair(logins[j],right))) {
                    System.out.println(logins[i] + " - " + right);;
                    result++;
                }
            }
        }
        System.out.println(a);
        return result;
    }
    public static String getRight(String item){
        String right = "";
        for (int i = 0; i < item.length(); i++) {
            int pos = alphabet.indexOf(item.charAt(i));
            right+= alphabet.charAt(pos > (alphabet.length()-1)?0:pos+1);
        }
        return right;
    }
    public static String getLeft(String item){
        String left = "";
        for (int i = 0; i < item.length(); i++) {
            int pos = alphabet.indexOf(item.charAt(i));
            left+=alphabet.charAt((pos-1)<0?alphabet.length()-pos-1:pos-1);
        }
        return left;

    }
    public static boolean isPair(String a, String b){
        return (a.equals(b));
    }
}