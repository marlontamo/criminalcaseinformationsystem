<html>
	<form method="POST" action="A_function.php">
		PHOTO: <input type="text" name="photo"><br/>
		First Name: <input type="text" name="fname"><br/>
		Last Name: <input type="text" name="lname"><br/>
		Middle Name: <input type="text" name="mname"><br/>
		Gender: <input type="text" name="gender"><br/>
		Address: <input type="text" name="address"><br/>
		Contact Number:<input type="text" name="contactNo"><br/>
		Birthdate:<input type="text" name="birthdate"><br/>
		Rank: <input type="text" name="rank"><br/>
		Agent No: <input type="text" name="agentNo"><br/>

		<input type="submit" name="submit" value="UPDATE"/>
	</form>
</html>








<?PHP
	$agent=array();
	$agent[0]=$_POST["photo"];
	$agent[1]=$_POST["fname"];
	$agent[2]=$_POST["mname"];
	$agent[3]=$_POST["lname"];
	$agent[4]=$_POST["gender"];
	$agent[5]=$_POST["address"];
	$agent[6]=$_POST["contactNo"];
	$agent[7]=$_POST["birthdate"];
	$agent[8]=$_POST["rank"];
	$agent[9]=$_POST["agentNo"];
	
	/*when the button is triggered call the updateAgent function and display the entered values to be updated in the database */
	if(isset($_POST['submit'])){
		
	$output=updateAgent($agent);
		for($x=0; $x<10; $x++){
			echo $output[$x] ."<br/>";
		}
		
	}
	
	/**
	* this function updates the current data in the agent_table. This function needs a search_function in order to find the target update faster.
	  Once the user search an evidence the agentNo column will present datas in link form.
	  Once the user click a link from a specific row, the user will be ridirected to the evidenceUpdate page. 
	*@param $agent is an array use to hold multiple values
	*@return $agent will return the entered value (just for testing)
	*@do nothing if there no entered values
	*/
	
	
	
	function updateAgent($agent){
echo"------------------------------------------------------------------------result--------------------------------------------------------------------------<br/>";
		if($agent == null){
			return;
		}
		else{
		/**
			$photo=$agent[0];
			$fname=$agent[1];
			$lname=$agent[2];
			$mname=$agent[3];
			$gender=$agent[4];
			$address=$agent[5];
			$contactNo=$agent[6];
			$rank=$agent[7];
			$birthdate=$agent[8];
			$agentNo=$agent[9];
			
			return $agent;
			
		
		//sql query to update the agent_table
		$sql = "UPDATE agent set photo=;".$photo."',
								 A_lname='".$lname."',
								 A_fname='".$fname."', 
								 A_mname='".$mname."',
								 A_gender='".$gender."',
								 A_address='".$address."',
								 A_contactNo='".$contactNo."',
								 A_rank='".$rank."',
								 A_birthdate='".$birthdate."'
								 where agentNo='".$agentNo."'";
		*/
		}
	}//end of updateAgent function
	
echo "----------------------------------------------------------------------------------------------------------------------------------------------";	

?>

