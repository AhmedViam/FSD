/************************************************************************************
* Author     : Viam
* File       : Sort.java
* Size       : 4.00 KB
* Language   : Java
* Role       : Generate an array of random numbers and sort them on a ascending order.
************************************************************************************/

import org.apache.commons.lang.ArrayUtils; // Most important import

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Random;

public
class Sorter {
    private
    ArrayList<Integer> numbers;

    public
    static void main(String[] args)
    {
        int[] process = fillArray(20000, 0, 210000);
        sorter(process, 20000);
    }

    public
    static int[] sorter(int array[], int size)
    {

        int[] useArray = array;
        Integer[] newArray = ArrayUtils.toObject(useArray);
        List<Integer> arrayList = new ArrayList(Arrays.asList(newArray));
        List<Integer> storeList = new ArrayList(Arrays.asList(newArray));
        storeList.clear();

        int counter = 1;
        int minval = 0;
        int diffsize = size - 1;
        int actualVal = 0;
        int storeArray[] = new int[size];
        int removeIndex = 0;

        System.out.println((arrayList));
        for (int i = 0; i < size + diffsize; i++) {
            for (int n = 0; n < size - 1; n++) {
                if (arrayList.get(minval) < arrayList.get(counter)) {
                    actualVal = arrayList.get(minval);
                    // System.out.println((arrayList.get(minval)) + " Less than " + arrayList.get(counter));
                    counter = counter + 1;
                    removeIndex = minval;
                }
                else {
                    actualVal = arrayList.get(counter);
                    //  System.out.println((arrayList.get(counter)) + " Less than " + arrayList.get(minval));
                    minval = counter;
                    removeIndex = counter;
                    counter = counter + 1;
                }
            }

            size = size - 1;
            counter = 1;
            minval = 0;

            if (arrayList.size() == 1) {
                storeList.add(arrayList.get(0));
                int d = 0;
                int[] ints = new int[storeList.size()];
                for (Integer u : storeList) {
                    ints[d++] = u;
                }
                System.out.println(storeList);
                return ints;
            }
            storeList.add(actualVal);
            arrayList.remove(removeIndex);
        }
        int d = 0;
        int[] ints = new int[storeList.size()];
        for (Integer u : storeList) {
            ints[d++] = u;
        }

        return ints;
    }

    public
    static int randomNum(int lower, int upper)
    {
        Random rand = new Random();
        int randomNum = lower + rand.nextInt((upper - lower) + 1);
        return randomNum;
    }

    public
    static int[] fillArray(int size, int lowerBound, int upperBound)
    {
        int holdArray[] = new int[size];
        int count_num = 0;
        int rand = 0;

        for (int count = 0; count < holdArray.length; count++) {
            holdArray[count] = 0;
        }

        for (int count = 0; count < holdArray.length; count++) {

            rand = randomNum(lowerBound, upperBound);
            if (ArrayUtils.contains(holdArray, rand)) {
                count_num = count_num + 1;
                System.out.println("Already contains " + rand + " generating new value");
                while (ArrayUtils.contains(holdArray, rand)) {
                    rand = randomNum(lowerBound, upperBound);
                    count_num = count_num + 1;
                    System.out.println("Already contains " + rand + " generating new value");
                }
            }
            holdArray[count] = rand;
        }

        return holdArray;
    }
}
