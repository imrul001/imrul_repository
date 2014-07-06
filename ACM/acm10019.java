/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package testPackage;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

class Main {

    public static void main(String[] args) {
        Main acm = new Main();
        Scanner scanner = new Scanner(System.in);
        int testCounter = scanner.nextInt();
        for (int i = 0; i < testCounter; i++) {
            long N = scanner.nextInt();
            System.out.println(acm.getOneCountInBinary(N) + " " + acm.printResultOfHexa(N));
        }
    }

    /**
     * Method to print result of 1's in Hexadecimal number
     */
    public long printResultOfHexa(long m) {
        List<Long> digits = digits(m);
        int numberOfOnes = 0;
        for (long digit : digits) {
            numberOfOnes = numberOfOnes + getOneCountInBinary(digit);
        }
        return numberOfOnes;
    }

    /**
     * Method to count 1s in Binary
     */
    public int getOneCountInBinary(long value) {
        int count = 0;
        long reminder = 0;
        for (int i = 0;; i++) {
            reminder = value % 2;
            value = value / 2;
            if (reminder == 1) {
                count++;
            }
            if (value == 0) {
                break;
            }
        }
        return count;
    }

    /**
     * Method To make digits separate
     *
     */
    public List<Long> digits(long i) {
        List<Long> digits = new ArrayList<Long>();
        while (i > 0) {
            digits.add(i % 10);
            i /= 10;
        }
        return digits;
    }
}
