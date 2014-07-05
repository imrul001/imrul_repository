/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package testPackage;

/**
 *
 * @author imrul
 */
import java.util.Scanner;
class acm10055 {

    public static void main(String[] args) {
        Scanner in=new Scanner (System.in);
        while(in.hasNext())
        {
            long a=in.nextLong();
            long b=in.nextLong();
            if(a>b)
                System.out.println(a-b);
            else
                System.out.println(b-a);

        }
    }
}

