<?php
/**
*@desc calculate the hypotenus of a right triangle given the two sides.The hypotenous is calculated using the pythagorean theorem.
*@param side1 first side of the right triangle, it should not be null and not 0.
*@param side2 second side of the right triangle it should not be null and not 0.
*@return the calculated hypotenus if both sides are valid.
*@return null if the sides are not valid.
*/
function computeHypotenus($side1, $side2){
   //validate the sides
   if($side1 == null || $side2 == null || $side1 == 0 || $side2 == 0)
			return null;
	
	//if sides are valid calculate hypotenus
	$side1Squared = $side1 * $side1;
	$side2Squared = $side2 * $side2;
	$sideSum = $side1Squared + $side2Squared;
	
	//sqrt is a function provided by the PHP library for getting square root.
	$hypotenus = sqrt($sideSum);
	
	//round is a function provided by the PHP library for rounding numbers
	$roundedValue = round($hypotenus, 2);
	return $roundedValue;
}
?>
mateo
sagud
grahambel
milo
tan,embernate, camacho, antwi, tamo,
tangalin,simalong


v1.0
functions tested
