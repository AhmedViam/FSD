#/***************************************************************************************
#* Author     : Viam / TP037249
#* File       : Sort.py
#* Size       : 4.00 KB
#* Language   : Python 2.7.x
#* Role       : Generates an array of random numbers, checks for duplicate elements,
#*				if found, replaces them	and sorts them on a ascending order.
#* Acknowledgements : I am studying from the book "Learning Python" by Mark Lutz, 
#*					  A book worth every cent that I paid
#*					  http://www.oreilly.com/pub/au/446
#**************************************************************************************/

# Rudimentary imports, nothing fancy
import random

global randomnum # Scope needs to be available for all

#Not used now, this method uses a built in function, I've already created the manual one
'''
def randomNumber(lowerBound,upperBound):
	randomnum = randint(lowerBound,upperBound)
	return randomnum
'''

#Sample is not used because it is a built in python function to produce non-repeating numbers, instead I'll do it manually
def generateRandom(lowerBound,upperBound):
	#array = random.sample(range(lowerBound,upperBound),size) # sample method from "random" package allows for non-repeating random numbers. Make sure sample size is not larger than population
	rand = random.randrange(lowerBound,upperBound+1)
	return rand


def fillArray(size,lowerBound,upperBound):
	count =0
	array =[]
	for i in range(0,size):
		random = generateRandom(lowerBound,upperBound)
		if random in array:
			count = count +1
			print "Array element at index" , i , " Already contains", random , "generating new value"
			while random in array:
				random = generateRandom(lowerBound,upperBound)
				if random in array:
					print "Array element at index" , i , " Already contains", random , "generating new value"
					count = count+1
		array.append(random)
	print "Numbers were repeated a total of  ", count , " time(s), and had to be re-generated"
	return array
				


def sortArray(size,lowerBound,upperBound):
	useArray = fillArray(size,lowerBound,upperBound)
	print useArray
	arraysize = len(useArray)
	counter = 1
	minval = 0
	difsize = arraysize -1
	actualVal =0
	newArray =[]

#Nested for loop to go through each element, then let each element go through the whole array comparing
	for i in range(0,arraysize+difsize): # Interesting calculation here for the nested for loop
		for n in range(0,arraysize-1):
			if useArray[minval] < useArray[counter]:
				counter = counter +1
				actualVal = useArray[minval]
			else:
				minval = counter
				actualVal = useArray[counter]
				counter = counter +1

		arraysize = arraysize -1
		counter =1
		minval =0
		if i + arraysize ==i: # To push the final element left in the array, as there is no need to compare when there is only 1 element left
			newArray.extend(useArray) # Notice the extend, no need to use append as this is the last element
			return newArray
		newArray.append(actualVal) 
		useArray.remove(actualVal)
	return newArray

print sortArray(20,0,19)
