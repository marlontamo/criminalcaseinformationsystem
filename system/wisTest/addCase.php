<?php
//palitan nyo nlng kung anu gamit nyo settings
$dbconn= mysql_connect("localhost","root","root");


/*FUNCTION ADDCASE is use for adding case in the database
*@param case is an array use to hold number of values
*@return case will return the entered value (just for testing)
*@do nothing if there no entered values
-------------------------------------------------------------------*/
function addCase($case = null){
		$victim = $case["victim"];	
		$suspectNo = $case["suspectNo"];
		$type = $case["typeOfCrime"];
		$desc = $case["description"];
		$date = $case["date"];
		$precinctNo = $case["precinctNo"];
		$agentNo = $case["agentNo"];
		$caseStatus = $case["caseStatus"];
		if($case == null)
			return null;
		
		else{
		
		  echo '<table cellspacing="2" cellpadding="1" border="1">';
				
				echo '<tr>';
					echo '<td>Victim</td>';
					echo '<td>Suspect No</td>';
					echo '<td>Type of Crime</td>';
					echo '<td>Description</td>';
					echo '<td>Date</td>';
					echo '<td>Precinct No</td>';
					echo '<td>Agent No</td>';
					echo '<td>Case Status</td>';
					
				echo '</tr>';
				echo '<tr>';
						echo '<td>'.$victim.'</td>';
						echo '<td>'.$suspectNo.'</td>';
						echo '<td>'.$type.'</td>';
						echo '<td>'.$desc.'</td>';
						echo '<td>'.$date.'</td>';
						echo '<td>'.$precinctNo.'</td>';
						echo '<td>'.$agentNo.'</td>';
						echo '<td>'.$caseStatus.'</td>';
						
					echo '</tr>';
		 echo '</table>';
		  }
			
		
		
		      
		
		/*$sql = mysql_query("INSERT INTO table_name (victim, suspectNo, typeOfCrime, description, dateFiled, precinctNo, agentNo, caseStatus) 
				VALUES ('$victim','$suspectNo','$type','$desc','$date','$precinctNo','$agentNo','$caseStatus')");*/
			 //$case;}
			

}
/*----------------------------test ----------------------------------------*/
if(isset($_POST["submit"])){
	/*i just used $case[number] for testing
	*/
	$case = array();
	$case["victim"] = $_POST["victim"];
	$case["suspectNo"] = $_POST["suspectNo"];
	$case["typeOfCrime"] = $_POST["type"];
	$case["description"] = $_POST["desc"];
	$case["date"] = date('F j, Y');//$_POST["date"];
	$case["precinctNo"] = $_POST["precinctNo"];
	$case["agentNo"] = $_POST["agentNo"];
	$case["caseStatus"] = $_POST["caseStatus"];

/*when the button is triggered call the addCase function and display the entered values to be inserted in the database */
	$result = addCase($case);
		
		echo "<hr/>";
		
	  
}
/*--------------------------------------------------------------------*/
?>

<html>
<head></head>
<body>
<form method="POST" action="addCase.php">
victim: <input type="text" name="victim" value=""><br/>
suspect no: <input type="text" name="suspectNo" value=""><br/>
type of crime: <input type="text" name="type" value=""><br/>
description: <textarea type="text" name="desc" value=""></textarea><br/>
precinct no: <input type="text" name="precinctNo" value=""><br/>
agent no. assigned: <input type="text" name="agentNo" value=""><br/>
case status: <input type="text" name="caseStatus" value=""><br/>
<input type="submit" name="submit" value="ADD"/>
</form>
</body>
</html>
