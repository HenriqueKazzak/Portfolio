import org.apache.commons.lang3.StringUtils;

import javax.swing.*;

public class Exemplo1 {
    public static void main(String[] args){
        int i[] = new int[12];
        double d[] = {1,5,3,2,6};
        String coll[]={"ID","Desc","Price"};
        //int n = Integer.parseInt(JOptionPane.showInputDialog("Qual o valor de N?"));

        for (int j = 0; j < i.length; j++) {
            System.out.println(d[j]+"\n");
        }
        StringUtils.join(";",d);
    }

}
