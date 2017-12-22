<?php
//test the function
include ('sample.php');

$username = "";
$password = "";
$valid = "correct";
$expectedOutput = null;

$output = log_in($username , $password);

if($expectedOutput == $output)
	echo "passed<br />";
else
	echo "failed<br />";
echo "<hr />";
//prepare test data
$side1 = 10;
$side2 = 12;
$expectedOutput = 15.62;

//now test 
$actualOutput = computeHypotenus($side1, $side2);

echo "Test date:<br/>";
echo "side 1: ".$side1."<br />";
echo "side 2: ".$side2."<br />";
echo "Expected Output: ".$expectedOutput."<br/>";
echo "Actual Output: ".$actualOutput."<br/>";

if($expectedOutput == $actualOutput)
	echo "Result: PASSED<br/>";
	else
	echo "Result: FAILED <br />";

echo "<hr/>";	
//more test
$side1 = 13;
$side2 = 15;
$expectedOutput = 19.85;

//now test 
$actualOutput = computeHypotenus($side1, $side2);
echo "Test date:<br/>";
echo "side 1: ".$side1."<br />";
echo "side 2: ".$side2."<br />";
echo "Expected Output: ".$expectedOutput."<br/>";
echo "Actual Output: ".$actualOutput."<br/>";

if($expectedOutput == $actualOutput)
	echo "Result: PASSED<br/>";
	else
	echo "Result: FAILED <br />";

echo "<hr/>";	

//try test invalid input
$side1 = -1;
$side2 = null;
$expectedOutput = null;

//now test 
$actualOutput = computeHypotenus($side1, $side2);
//this is the output
echo "Test date:<br/>";
echo "side 1: ".$side1."<br />";
echo "side 2: ".$side2."<br />";
echo "Expected Output: ".$expectedOutput."<br/>";
echo "Actual Output: ".$actualOutput."<br/>";

if($expectedOutput == $actualOutput)
	echo "Result: PASSED<br/>";
	else
	echo "Result: FAILED <br />";

echo "<hr/>";	
?>