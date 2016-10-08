'#/*************************************************************************************
'#* Author     : Viam
'#* File       : Sort.vb
'#* Size       : 3.00 KB
'#* Language   : VB.NET
'#* Role       : Generate an array of random numbers and sort them on a ascending order.
'*************************************************************************************/



Imports System
Imports System.Collections
Imports Microsoft.VisualBasic
Module Module1
 
    Sub Main()
    	
        makeArray(0,10,10)
        'Do Until (Console.ReadKey.Key = ConsoleKey.Escape)
        
'Loop
        
    End Sub 
 
    Public Function randomNum(ByVal low As Integer, ByVal high As Integer) As Integer
    	Dim randomValue As Integer
 		randomValue = CInt(Math.Floor((high - low + 1) * Rnd())) + low
 		return randomValue

    End Function 
    
    
   ' Public Function checkExist(ByVal numbers() As Integer,ByVal searchval As Integer,ByVal size As Integer ) As Integer
    '	For value As Integer =0 To size
    '		If searchval = numbers(value) Then
    '		'	Console.WriteLine("found")
    '			Return 3
    '		End If
    '	Next
    '	Return 4
   ' End Function 
    
    public Function makeArray(ByVal low As Integer, ByVal high As Integer, ByVal size as Integer) as String()
    	Dim count As Integer
    	Dim random As Integer
    	Dim arra As New ArrayList()
    	Dim dif As Integer = size-1
    	Dim index As Integer
    	Dim posdex As Integer
	    posdex =0
	' Dim arra As Integer() = New Integer(19) {}
	'Dim arra(20) As Integer
	while posdex < 10
	For index As Integer = 0 To size+8
    	random =(randomNum(0,10))
    	if Not (arra.Contains(random)) Then
    		count = count +1
    		'Console.writeline("Already contains generating new number")
    		random = randomNum(0,10) 
    		while (arra.Contains(random) = true)
    			random = randomNum(0,10)
			End While		
    	End If
    	If arra.Contains(random) = false
    		arra.add(random)
    		posdex = posdex +1
    	End If
    Next
    End While
    			'Console.WriteLine(count)
For i As Integer = 0 To arra.Count - 1
Dim val As String = arra(i).ToString()
Console.WriteLine(val)

Next
    End Function
End Module