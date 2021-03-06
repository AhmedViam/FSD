<?php
/***********************************************************************************
* Author     : Viam
* File       : Sort.php
* Size       : 8.00 KB
* Language   : PHP
* Role       : Generate an array of random numbers and sort them on a ascending order.
************************************************************************************/

/****** Class initialisation ******/


Class Sort {

	public $numbers = array();	// Array variable to hold the numbers generated by arrayofNumber, Array creation function
	public $finalArray = array(); // Holds the final array containing sorted numbers
	public $storeArray = array(); // Holds unsorted numbers generated by the generateRandomNumber function.
	public $type = array('Descending' => '0','Ascending'=>'1'); // Not used, might be if descending is to be implemented later
	public $upperBound = 0; // Upper limit of random numbers
	public $lowerBound = 0; // Lower limit of random numbers
	public $isEntropy = false; // Not implemented, making an entropy function enables us to create a truely random number generator


    /**
    * Generate random numbers 
    * @public
    * Returns exactly one random number
    * rand is the php function of random number generation
    */
		 
	public function generateRandomNumber($upperBound,$lowerBound,$isEntropy){


		$randomNumber = rand($lowerBound,$upperBound);

		return $randomNumber;
	}

   /**
    * Creates the array of given size, this will be filled with the random numbers 
    * @public
    * Returns array of random numbers
    * array_push is the php function to push a new element to a array. In this case we keep adding random numbers to the array
    */
		
	public function arrayofNumber($arrayLength,$upperBound,$lowerBound,$isEntropy){

		for($i=0;$i<$arrayLength;$i++){

		$randomNumber = $this->generateRandomNumber($upperBound,$lowerBound,$isEntropy);
		 array_push($this->numbers,$randomNumber);

		}

	return $this->numbers;

	}

	/**
    * Check for duplicates numbers and generate number numbers to fill their indexes
    * Not implement
    */


	 public function checkDuplicate($array){
	 	$counter = 1;
	 	$size = sizeof($array)-1;
		$rd = $size-1;
		$gh =0;
		while($gh =0){	
	 	for ($i=0; $i < $sizeof; $i++) { 
	 		//while($counter < 20){	
	 			for ($n=0; $n < $size ; $n++) { 
	 				if($array[$i] == $array[$counter]){
	 					echo "Found duplicate of $array[$i] at index $i and $array[$counter] at $counter  <br>";
	 					unset($array[$i]);
	 					$rand = rand($this->lowerBound,$this->upperBound);
	 					array_splice($array,$i-1,0, $rand);
	 				}
					$counter =  $counter + 1;
				}
	 		//}	
	 	}
	 	$gh =1;
	 }
	 	return $array;
	 }


    /**
    * Sort the random number array list
    * @public
    * Output both unsorted and sorted array, It would be better to change this from output to a return function with 2 returns( 2 in an array as 2 real returns are not possible),
    * Sorted and unsorted returns.
    */
		 


	public function sorter(){

		$arrayofNumber = $this->arrayofNumber(20,50,1,false); // initialize the random array function to get a array with 
															  // 20 random numbers, from 1-11 and false for entropy
		$arrayofNumber = $this->checkDuplicate($arrayofNumber);
		//$arrayofNumber = array_unique($arrayofNumber);

		$this->finalArray; // change scope of global class public variable finalArray to local scope with $this->, you can
						  // also use Sort::finalArray instead of $this->
		$size = sizeof($arrayofNumber); // gets size of the array
		$counter = 1; // set a counter to 1
		$minval = 0; // set minimum value of index of array to absolute 0
		$rd = $size-1; // rd is the difference calculation, which is always max array size -1

		echo "Array of random numbers of<br>";
		print_r($arrayofNumber);  // First print the random array
		echo "<br>";

		for ($d=0; $d < $size+$rd; $d++) {  // first for loop to go through each element in the random array
			for ($i=0; $i < $size-1; $i++) {  // Second loop, this loop is special , this one takes the current element of loop
											  // and compare it with the rest of the values in the loop

			
				if($arrayofNumber[$minval] < $arrayofNumber[$counter]){ // if first elemt is less than second element
					$counter = $counter +1;	 							//  To make sure next time we compare we compare the third value, cause
																		// we already compared element 1 and 2 in the first if statment
					$actualVal = $arrayofNumber[$minval];				// Set the current smallest value to $arrayofNumber[$minval], which if you noticed 
																		// is  $arrayofNumber[0], because the if statment above has passed the check for 
																		// checking if the first element is the smallest
	
				} else {
					$minval = $counter;									// If the second value is the smallest during comparision
																		// Set the current smallest value to the second value of comparision
					$actualVal = $arrayofNumber[$counter];
					$counter = $counter +1;								// Jump to the next value to compare
				}
			}

			$size = $size-1;        									// Make sure the loop decrements, as we loopover
			$counter =1;												// Clear and re-decleare these constants as the loop is again about
																		// to restart
			$minval = 0;
			$keylast =array_search($actualVal, $arrayofNumber);       // now search the random number array to find the smallest value we found from the 
																	 // main for loop

			if(sizeof($arrayofNumber) ==1){							// if it is the first element(index 0), push it to the first index of the finalArray, which holds the sorted values

				array_push($this->finalArray, $arrayofNumber[0]);

			} else {
				array_push($this->finalArray, $actualVal);       // or push it to the finalArray regardless of position
				$key = array_search($actualVal, $arrayofNumber); // Rememebr we have to remove the smallest value from the random array to recalculate the next
																// smallest value
				unset($arrayofNumber[$key]);					// unset removes it
		
				foreach ($arrayofNumber as $value) {			// Rebuild the store array to reuse after deducting the smallest value
					array_push($this->storeArray, $value);
				}

				$arrayofNumber = $this->storeArray;			 // Re-declear the store array
				unset($storeArray);							 // unset makes sure to remove any values that might accidentally be there
				$this->storeArray = array();				// array is now again localised
			} // first for loop done
		} // second for loop done

				$k1 = array_search($actualVal, $arrayofNumber); // test, not used atm

				echo "<br>";
				echo "Array of sorted numbers<br>";    
				print_r($this->finalArray); // now finalArray contains all of the values in the random array sorted
	}
}

$test = new Sort(); // initilize a new class instance for us to use
echo "<pre>"; // makes output formatted for easier reading
$sorted =$test->sorter(); // assign the object from the class(sorter, which is the object/function) to test, which is the main class handle
						 // and assign all of it to a variable call $sorted so we can use all of these initilized class/objects