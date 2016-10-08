/*************************************************************************************
* Author     : Viam
* File       : Sort.cpp
* Size       : 5.00 KB
* Language   : C++
* Role       : Generate an array of random numbers and sort them on a ascending order.
************************************************************************************/



#include <iostream>
#include <string>
#include <ctime>
#include <iterator>
#include <cstdlib>

using namespace std;

  /**
    * Generates the random number within the provided range
    * return int
    */

int randomNum(int lowerBound, int upperBound) {
  int random;
  random = lowerBound + rand() % (upperBound - lowerBound);
  return random;
}



  /**
    * Check for duplicates in an array
    * Accepts pointer to the dynamic array.
    * return true if found, else false
    */


int checkDuplicate(int size, int value, int *pholdArray) {
  int *arrholder = pholdArray;
  for (int g = 0; g < size; g++) {
    if (arrholder[g] == value) {
      cout << "Found repeated value " << value << " generating new value\n";
      return true;
    }
  }
  return false;
}



  /**
    * Find the largest number in the array
    * Used but cannot be implemented correctly
    */



 int * findLargest(int * pholdArray,int size){
  int minval =0;
  int counter =1;
  int *maxholder = pholdArray;
  int bigValue = 0;

  for(int f =0;f<size;f++){
    for(int g=0;g<size;g++){
      if(maxholder[minval] > maxholder[counter]){
        bigValue = maxholder[minval];
        counter = counter+1;
      } else {
          if(maxholder[counter] > maxholder[minval]){
            bigValue = maxholder[counter];
            minval = counter;
            counter = counter+1;
          }
      }
    }
  }
}



  /**
    * Accepts the pointer to the array filled with random numbers
    * Suppose to return the sorted array, but the pointer seems to bug with the last few indexes, otherwise fine 
    */


int *sorter(int size, int *pholdArray, int lowerBound, int upperBound) {
  int holds[size];
  for (int h = 0; h < size; h++) {
    holds[h] = pholdArray[h];
  }

  int *holder = pholdArray;
  int counter = 1;
  int minval = 0;
  int diffsize = size - 1;
  int acsize = size;
  int actualVal = 0;
  int *storeArray = new int[size]();
  int *se = new int[size]();
  int removeIndex = 0;

  for (int i = 0; i < size + diffsize; i++) {
    for (int c = 0; c < size - 1; c++) {
      if (holder[minval] < holder[counter]) {
        actualVal = holder[minval];
        counter = counter + 1;
        removeIndex = minval;
      } else {
        actualVal = holder[counter];
        minval = counter;
        removeIndex = counter;
        counter = counter + 1;
      }
    }
    size = size - 1;
    counter = 1;
    minval = 0;
    // if(i == size-1){
    //   storeArray[size-1] =holder[0];
    //    return storeArray;
    // }
    storeArray[i] = actualVal;
    for (int g = removeIndex; g < size; ++g) {
      holder[g] = holder[g + 1];
    }
    // array_size--;
    if (i == acsize - 1) {
      storeArray[i] = holder[0];
      //*se = newstore[0];
      // cout << newstore[0][2];
      return storeArray;
    }
  }
}



  /**
    * Generates the array of given size
    * Not used anymore, array is generated in realtime
    */


/*

int* generateArray(int size){
    int parray[size];
    return parray;
}
*/

  /**
    * Fill the generated array with non-repeating random numbers
    */

int *fillArray(int size, int lowerBound, int upperBound) {
  int repeat = 0;
  int flag = 0;
  int random;
  int *pholdArray = new int[size]();

  for (int count = 0; count < size; count++) {
    random = randomNum(lowerBound, upperBound);
    if (checkDuplicate(size, random, pholdArray)) {
      repeat++;
      while (checkDuplicate(size, random, pholdArray)) {
        random = randomNum(lowerBound, upperBound);
        repeat++;
      }
    }
    pholdArray[count] = random;
  }
  // cout <<"\n Total of " << repeat << " numbers got repeated and
  // re-generated\n";
  return pholdArray;
}




  /**
    * Ugly code below, not enough time to clean up
    */




int main() {
  const int size = 10;
  srand(time(0));
  // int *p = generateArray(12);
  int *n = fillArray(size, 0, 12);
  // int *g = (int*)malloc(sizeof(n));
  int *d = sorter(size, fillArray(size, 0, 12), 0, 12);

  cout << "\n";
  cout << "[";
  for (int k = 0; k < size; k++) {
    if (k == size - 1) {
      cout << n[size - 1];
      break;
    }
    cout << n[k] << ",";
  }
  cout << "]";

  cout << "\n";
  cout << "[";
  for (int j = 0; j < size; j++) {
    if (j == size - 1) {
      cout << n[size - 1];
      break;
    }
    cout << d[j] << ",";
  }
  cout << "]";

  return 0;
}
