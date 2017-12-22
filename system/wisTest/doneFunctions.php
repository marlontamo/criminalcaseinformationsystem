//finished functions
<?php
/*------------------------------
*@desc function searchAgent is use for searching agent profile inside the database using the entered keyword to compare its value with the id or name of the registered user
*@param keyword is the keyword(agent number or name) that will be entered by the user
*@returns null if there is no entered value in the search box and the search button is triggered
*@returns true if there is if there is value to be searched
-------------------------------*/
function searchAgent($keyword = null){
       
			if($keyword == null )
				return null;
		
		//if the user entered a value this function returns a true value
			else
		/*SQL code
		*$sql = Select * from <agent table> WHERE  username LIKE '%".strtolower($keyword)."%' OR agentNo LIKE '%".strtolower($keyword)."%'";
		*$result = mysql_query($sql);*/
			     return true;
}
/*FUNCTION ADDCASE is use for adding case in the database
*@param case is an array use to hold number of values
*@return case will return the entered value (just for testing)
*@do nothing if there no entered values
-------------------------------------------------------------------*/
function addCase($case = null){
		if($case == null)
			return;
			
		else
		/*$sql = mysql_query("INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...) ;");*/
			return $case;

}
/**
* @desc Add the Agent in the database.
* @param $agent_photo the image of the agent.
* @param $agent_rank the rank of the agent.
* @param $agent_Lname Last name of the agent.
* @param $agent_Fname First name of the agent.
* @param $agent_Mname Middle name of the agent.
* @param $agent_gender Gender of the agent.
* @param $agent_address Address of the agent.
* @param $agent_contact Contact number of the agent.
* @param $a_month Birth Month of the agent.
* @param $a_day Birth Day of the agent.
* @param $a_year Birth Year of the agent.
* @param $agent_marital_status Marital Status of the agent.
* @param $agent_nationality Nationality of the agent.
* @param $crime_special Crime Specialization of the agent.
* @param $a_others Other information of the agent.
*/

function add_agent($agent_photo,$agent_rank,$agent_Lname,$agent_Fname,$agent_Mname,$agent_gender,$agent_address,$agent_contact,$a_day,$a_month,$a_year,$agent_marital_status,$agent_nationality,$crime_special,$a_others){

// Shorthand for the form data:
 $agent_photo =$_POST['agent_photo'];
 $agent_rank =$_POST['agent_rank'];
 $agent_Lname =$_POST['agent_Lname'];
 $agent_Fname =$_POST['agent_Fname'];
 $agent_Mname =$_POST['agent_Mname'];
 $agent_gender =$_POST['agent_gender'];
 $agent_address=$_POST['agent_address'];
 $agent_contact =$_POST['agent_contact'];
 $a_month =$_POST['a_month'];
 $a_day =$_POST['a_day'];
 $a_year =$_POST['a_year'];
 $agent_marital_status =$_POST['agent_marital_status'];
 $agent_nationality =$_POST['agent_nationality'];
 $crime_special =$_POST['crime_special'];
 $a_others =$_POST['a_others'];
 

 

// Database connection.
$con=mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("agent",$con) or die (mysql_error());

if ($agent_photo =="" || $agent_rank =="" || $agent_Lname=="" || $agent_Fname=="" || $agent_Mname=="" || $agent_gender=="" || $agent_address=="" || $agent_contact=="" || $a_month=="" || $a_day =="" || $a_year =="" || $agent_marital_status=="" || $agent_nationality =="" || $crime_special =="" ){
echo "Please check your data. Thank you!! "; 
}

else {

// Add Agent to the agent database.
$sql="INSERT INTO agents(image, rank, lastname, firstname, middlename, gender, address, contactno, day, month, year, maritalstatus, nationality, crimespecialist, other ) VALUES('$agent_photo','$agent_rank','$agent_Lname','$agent_Fname','$agent_Mname','$agent_gender','$agent_address','$agent_contact','$a_day','$a_month','$a_year','$agent_marital_status','$agent_nationality','$crime_special','$a_others')";
	
 if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "Transaction Complete !!! ";
}
 
mysql_close($con)

}					
/**
* This function deletes a suspect based on the *complete name and case number of the suspect (*based
* on the new layout for delete suspect from the front end developers). The user needs to type the
* complete name of the suspect, the case number then press the delete button.
* @param completeName - The suspect's complete name.
* @param caseNo - The suspect's case number where he/she is involved.
* @return result - The result of the function 
*/	

	function deleteSuspect($completeName,$caseNo){
		$sql1= " SELECT * FROM suspect";
		$result = mysql_query($sql1);
		if($row = mysql_fetch_array($result)){
		
			if($row['completeName'] == $completeName && $row['caseNo'] == $caseNo){
				// query to delete specific suspect from the table.
				$sql2= " DELETE FROM suspect WHERE completeName = '".$completeName."'";
				$result2=mysql_query($sql2);
					if($result2){
					// if all is well...
					$result2 = "SUSPECT DELETED";
					return $result2;
				}
				else{
					// if there is an error...
					$result2 = "ERROR: some other error";
					return $result2;
				}
			}
			else{
				$result2 = "ERROR: no matching suspect/ case no and suspect name do not match";
				return $result2;
			}
		}		
	}
/**
	* this function updates the current data in the agent_table. This function needs a search_function in order to find the target update faster.
	  Once the user search an evidence the agentNo column will present datas in link form.
	  Once the user click a link from a specific row, the user will be ridirected to the evidenceUpdate page. 
	* @param lname -  agent lastname
	* @param fname - agent first name
	* @param mname - agent last name
	* @param address - agent address
	* @param gender - agent gender
	* @param contactNo - agent contact_number
	* @param rank - the agent rank/position in the organization
	* @param birthdate - agent birthday: consist of $month, $date, and $year concat as birthdate 
    * @param selector - "agentNo"(primary key)use to select specific row in the agent_table.
	* @return message - if the query is right message="Record updated", else message= "something is wrong"
	*/
	function updateAgent($lname,$fname,$mname,$gender,$address,$contactNo,$rank,$birthdate,$selector){
		//sql query to update the agent_table
		$sql = "UPDATE agent set A_lname='".$lname."',
								 A_fname='".$fname."', 
								 A_mname='".$mname."',
								 A_gender='".$gender."',
								 A_address='".$address."',
								 A_contactNo='".$contactNo."',
								 A_rank='".$rank."',
								 A_birthdate='".$birthdate."'
								 where agentNo='".$selector."'";
		$result=mysql_query($sql);
		if($result){//if the query is right
			$message = "Record Updated";
			return $message;
		}
		else{
			$message = "something is wrong";
			return $message;
		}
	}//end of updateAgent function
	
	/**
	* This Function updates the current data in the evidence_table. This function needs a search_function in order to find the target update faster. 
	  Once the user search an evidence the id column will present datas in link form.
	  Once the user click a link from a specific row, the user will be ridirected to the evidenceUpdate page.
	* @param caseNo - specifies to which case does the evidence belong
	* @param suspectNo - specifies to whom does the evidence belong
	* @param agentNo - the agent working on the case
	* @param description - description of the object.evidence
	* @param dateSubmiited - when was the evidence submitted
	* @param submittedBy - the uploader of the evidence
	* @param photoFiles - photos of the evidence
	* @param selector - "evidenceNo"(primary key)use to select specific row in the evidence_table.
	* @return message - if the query is right message="Record updated", else message= "something is wrong" 
	*/
	function updateEvidence($caseNo,$suspectNo,$agentNo,$description,$dateSubmitted,$submittedBy,$selector){
		//sql query to update the evidence_table
		/*
		$sql= "UPDATE evidence set caseNo='".$caseNo."',
								suspectNo='".$suspectNo."',
								agentNo='".$agentNo."',
								dateSubmitted='".$dateSubmitted."',
								submittedBy='".$submittedBy."',
								photoFiles='".$photoFiles."'
								 where evidenceNo='".$selector."'";
			*/
		$sql= "UPDATE evidence set caseNo='".$caseNo."',
				suspectNo='".$suspectNo."',
				agentNo='".$agentNo."',
				description='".$description."',
				dateSubmitted='".$dateSubmitted."',
				submittedBy='".$submittedBy."'
				 where evidenceNo='".$selector."'";
			
		
			$result=mysql_query($sql);
				if($result){//if the query is right
				$message = "Record Updated";
				return $message;
			}
			else{
				$message = "something is wrong";
				return $message;
		}
	}
	/**
	* this function updates the current data in the case_table. This function needs a search_function in order to find the target update faster.
	  Once the user search a case, the caseNo column will present datas in link form.
	  Once the user click a link from a specific row, the user will be ridirected to the caseUpdate page. 
	* @param assignedAgent - assigned agent: consist of agent's $lname, $fname, and $fname concat as assigned_agent 
    * @param caseStatus - this will decide whether the case stauts will be open, close, or ongoing.
	* @param caseNumber - "caseNo"(primary key)use to select specific row in the case_table.
	* @return message - if the query is right message="Case updated", else message= "An error was found"
	*/
	function updateCase($assignedAgent,$caseStatus,$selector){
		//sql query to update the case_table
		$sql = "UPDATE agent set assigned_agent='".$assignedAgent."',
								 case_status='".$caseStatus."',
								 where caseNo='".$caseNumber."'";
		$result=mysql_query($sql);
		if($result){//if the query is right
			$message = "Case Updated";
			return $message;
		}
		else{
			$message = "An error was found";
			return $message;
		}
	}//end of updateCase function
/**
 * @desc Check whether the user is a member or not. The function will validate the user input if the user input
 *       is valid or not.
 *@param username first input of the user, this field must contain not be null.
 *@param password second input of the user, this field must not be null.
 * @variable myrealuser is the actual username in the database for this example.
 * @variable realpassword is the actual password in the database for this example.
 *@return true if valid.
 *@return false if invalid.
 */


function login($username, $password){
    //actual value of the user's username and password from the database
    $realusername = "myrealuser";
    $realpassword = "myrealpassword";
    $true= "TRUE";
    $false="FALSE";
    //validate the user input
    if($username == $realusername && $password == $realpassword)
        return $true;
    elseif($username != $realusername || $password != $realpassword || $username == null || $password == null){
        return $false;
    }

}
function deleteSuspect($suspect_name){

$sql="DELETE * FROM suspect WHERE suspectNo ='" .$suspect_name. "';";
			$result=mysql_query($sql);
			if ($result){
				return true;
			}else{
				die ("error in sql query" . mysql_error()); 
			}
}
/**
* This function deletes a agent based on the *complete name and agent number of the agent (*based
* on the new layout for delete agent from the front end developers). The user needs to type the
* complete name of the agent, the agent number then press the delete button.
* @param completeName - The agentt's complete name.
* @param agentNo - The agent number where he/she is involved.
* @return result - The result of the function 
*/	

	function deleteAgent($completeName,$agentNo){
		$sql1= " SELECT * FROM agent";
		$result = mysql_query($sql1);
		if($row = mysql_fetch_array($result)){
		
			if($row['completeName'] == $completeName && $row['agentNo'] == $agentNo){
				// query to delete specific agent from the table.
				$sql2= " DELETE FROM agent WHERE completeName = '".$completeName."'";
				$result2=mysql_query($sql2);
					if($result2){
					// if all is well...
					$result2 = "agent DELETED";
					return $result2;
				}
				else{
					// if there is an error...
					$result2 = "ERROR: some other error";
					return $result2;
				}
			}
			else{
				$result2 = "ERROR: no matching agent/ agent no and agent name do not match";
				return $result2;
			}
		}		
	}
/**
	* this function updates the current data in the suspect_table.This function needs a search_function in order to find the target update faster.
    * Once the user search an suspect the SuspectNo column will present data in link form.
	* Once the user click a link from a specific row, the user will be redirected to the suspectUpdate page. 
	*@param $suspect is an array use to hold multiple values
	*@return $suspect will return the entered value (test only)
	*@do nothing if there no entered values
	*/
	function updateSuspect($suspect){
	echo"<center>=================================================result=================================================<br/>";
		if($suspect == null){
			return;
		}
		else{
			return $suspect;
		/**
		//
		
	    //sql query to update the suspect_table
		$sql = "UPDATE suspect set =CaseNo='".$CaseNo."',
								 SuspectAssignedNo.='".SuspectAssignedNo."',
								 photo='".$photo."',
								 case='".$case"',
								 fname='".$fname."',
								 lname='".$lname."',
								 mname='".$mname."',
								 adrress='".$address."',
								 birthdate='".$birthdate."',
								 birthplace='".$birthplace."',
								 CivilStatus='".$CivilStatus."',
								 Nationality='".$Nationality."',
								 Height='".$Height."',
								 Weight='".$Weight."',
								 SkinColor='".$SkinColor."',
								 EyeColor='".$EyeColor."',
								 HairColor='".$HairColor."',
								 where SuspectNo='".$SuspectNo."'";
		*/
		}
	}//end of updateSuspect function
	
echo "<center>=================================================result=================================================";	
/**
* @desc Add the Evidence in the database.
* @param $evidencenumber of the evidence.
* @param $fname first name of the suspect.
* @param $mname middle name of the suspect.
* @param $lname last name of the suspect.
* @param $age the age of the suspect.
* @param $alias of the suspect.
* @param $gender of the suspect.
* @param $evidence the evidence type of evidence.
* @param $date submitted of evidence.

*/
function add_evidence($evidencenumber,$fname,$mname,$lname,$age,$alias,$gender,$evidence,$date){

$evidencenumber = $_POST['evidence'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$alias = $_POST['alias'];
$gender = $_POST['gender'];
$evidence = $_POST['evidence'];
$date = $_POST['date'];


$query = "INSERT INTO evidence (evidencenumber, fname, mname, lname, age, alias, gender,
 evidence, date) VALUES ('$evidencenumber', '$fname', '$mname', '$lname', '$age', '$alias',
			'$gender', '$evidence', '$date')";
            $result = mysql_query($query) or die("Some kind of error occured.");

            echo "Welcome, you are now in my database!";



}
/*
*@desc this functions verify the username and the password we received and then look up those in the database. 
*@param username agent username is input, it should not be null.
*@param password agent password is input, it should not be null.
*@return to form again if invalid username and password.
*@return to form again if missing input.
*/

function Login($username, $password){
	
    if(empty($username)){
        echo "false";
        return false;
    }
     
    if(empty($password)){
        echo "false";
        return false;
    }
	else
     echo "true";
    
}
?>