package project.kazzak;

import java.util.*;

public class AmazonSDEI {

    public static void main(String... args) {

        List<String> teste = new ArrayList<String>();
        teste.add("bag");
        teste.add("red");
        teste.add("cbh");
        teste.add("cbh");
        teste.add("sfe");

        int i = countFamilyLogins(teste);
    }

    public static final String alphabet = "abcdefghijklmnopqrstuvwxyz";
    public static int countFamilyLogins(List<String> logins) {
        // Write your code here
        //Creat a HashMap with Key logins
        Map<String,Integer> hashmapFamily = new HashMap<String,Integer>();
        java.util.Collections.sort(logins);

        for (String item : logins) {
            String encryptString = getRight(item);
            String decryptString =getLeft(item);

            System.out.println(item);
            System.out.println(encryptString);
            System.out.println(decryptString);
            //Se decryptString estiver no array entao Item é criptografado e deve conter um outro Item nao criptografado
            int index = -1;
           /** if (Collections.binarySearch(logins,decryptString) >= 0){
                hashmapFamily.put(decryptString,0);
                index = Collections.binarySearch(logins,item);
                while (index >= 0){
                    hashmapFamily.put(decryptString,hashmapFamily.get(decryptString)+1);
                    logins.remove(index);
                    index = Collections.binarySearch(logins,item);
                }
            }
            //Caso encryptString conter no Array entao Item é uma chava.
            else if(Collections.binarySearch(logins,encryptString) >= 0){
                index = Collections.binarySearch(logins,encryptString);
                while (index >= 0){
                    if (hashmapFamily.containsKey(item)) {
                        hashmapFamily.put(item, hashmapFamily.get(item) + 1);
                    } else {
                        hashmapFamily.put(item, 1);
                    }
                    logins.remove(index); //quando remove esse item ocorre um erro no for
                    index = Collections.binarySearch(logins,encryptString);
                }
            }*/
        }
        return 1;
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
        return false;
    }
}