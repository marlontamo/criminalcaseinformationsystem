<?php
	/**FUNCTION TO CONNECT TO DATABASE**/
	function dbConnect($server,$username,$password,$database)
	{
		$conn = new mysqli($server, $username, $password, $database);
		
		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '
					. mysqli_connect_error());
		}
		
		return $conn;
	}
	
	
	
	/**function INPUT BOX is a field which hold the value of the data that the user wanted to search in the database
	*@param parameterArray is inputbox that will get value entered by the user
	*@returns value that will be used as an id to be compare in the database 
	**/
	
	function inputBox($parameterArray)
	{
	
		$value 	= '';
		$value  .= '<input ';
		foreach($parameterArray as $parameterIndex => $parameterValue){
			$value  .= $parameterIndex.' = "'.$parameterValue.'"';
		}
		$value  .= '/>';
		
		return $value;
	}
	
	/**FUNCTION TO SEARCH
	*@param input is the entered data or keyword by the user
	*@param table refers to the table inside the database
	*@param arrayValues are the fields of the table in the database
	*@param jointable use to connect different table
	*@param condition is the condition use in query
	*@returns index value
	**/
	function searchFunction($input, $table, $arrayValues, $jointable='', $condition)
	{
		$conn 		= dbConnect("localhost","root","root","marlon");
		
		$db_fields 	= "";
        $errmsg 	= "";
		/**empty() is a php function which checks if there are passed value return true or false(boolean)**/
		if (empty($arrayValues)) {
            echo "Incomplete Parameters Passed";
            die();
        }
		/**is_array() is a php function which determines if the object is an array and returns a true or false(boolean)**/ 
        if (!is_array($arrayValues)) {
            echo "Parameter Passed is not an Array";
            return false;
        }

        foreach ($arrayValues as $v) {
            $db_fields .= $v . ",";
        }

			$db_fields = substr($db_fields, 0, -1);

        if (!empty($condition)) {
            $condition = "WHERE $condition";
        } else {
            $condition = "";
        }

	    $sql = "SELECT $db_fields FROM $table $jointable $condition ";
		$stmt = mysqli_query($conn, $sql);	 

        $returnArray 	= array();
        $returnArr 		= array();
        
        if($stmt){

		    while ($row = mysqli_fetch_assoc($stmt)) {
		        foreach ($row as $rowIndex => $rowValue) {
		            $returnArray[$rowIndex] = $rowValue;
		        }
		        $var 			= implode('|', $returnArray);
		        $returnArr[] 	= $var;
		    }

			mysqli_free_result($stmt);
		}
        return $returnArr;
		
		}
		
	
//-----------------------testting area--------------------------------------------------------------------->
	
	/**get value of search input
	*@table value should be your table name in your database
	*@arrayFields values should be the fields of your table
	*@jointable value should be query in joining tables, but you can also leave as null 
	*@condition value should be condition sql query 
	
	**/
	$input		=(isset($_POST['searchkey'])) ? $_POST['searchkey'] : "";
	$dataArray	= array();
	
	if(isset($_POST['search']) && !empty($_POST['searchkey'])){
	/**here is where you can declare value for the parameters in searchFunction**/
	
		$table 		= "table1";
		$arrayFields= array('username','password');
		$jointable	= "";
		$condition	= " username LIKE '%".strtolower($input)."%' OR password LIKE '%".strtolower($input)."%'";
		
	/**calling searchFunction and assign to array**/
		$dataArray	= searchFunction($input='',$table, $arrayFields, $jointable='', $condition);
		
	}else if(isset($_POST['search']) && empty($_POST['searchkey']))
	     echo "please enter a value that you are trying to search";
	
//-----------------------------end testing-------------------------------------------------------------->
?>

<html>
	<head>
	<style>
	div{border: 5px solid black;
	width: 240px;
height: 30px;
	}
	</style>
	</head>
	<body>
	
	
	<!--for testing -->
	<div id="search">
		<form method="POST" action ="search.php">
			<!--?php
			 $searchBox = inputBox(
				array(
					'type' => 'search',
					'name' => 'searchkey',
					'value' => $input,
					'placeholder' => 'Search'
				)
			);
		
			 $searchButton = inputBox(
				array(
					'type' => 'submit',
					'name' => 'search',
					'value' => 'Submit'
				)
			);
			echo $searchBox.$searchButton;
			
			
			?-->
			<input type="search" name="searchkey" value=""/>
			<input type="submit" name="search" value="submit">
		
		</form>
		<?php
			/**output area**/
			if(!empty($dataArray) && !is_null($dataArray)){
				echo "<h3>RESULT </h3>";
				echo '<table cellspacing="0" cellpadding="0" border="1">';
				
				echo '<tr>';
					echo '<td>Username</td>';
					echo '<td>Password</td>';
					
				echo '</tr>';
				foreach($dataArray as $dataIndex => $dataValue){
					$dataIndex = $dataValue;
					$dataArr	= explode('|',$dataIndex);
					$user	= $dataArr[0];
					$pass	= $dataArr[1];
					
					
					echo '<tr>';
						echo '<td>'.$user.'</td>';
						echo '<td>'.$pass.'</td>';
						
					echo '</tr>';
				}
				echo '</table';
			}
			
			
			
		?>
		</div>
	</body>
</html>
<?php
/*--------------------------------------
 $person  = array();
	  $person["first_name"] = "Jose";
	  $person["last_name"] = "Dela Cruz";
	  
	  updateAgent($person);
	  
	   echo $keyword;0

	   
}

function updateAgent($person = null) {
	if($person == null)
		return;
		
	$firstName = $person["first_name"];
	
	// SQL for update
	// ---=mysql_query('')

---------------------------------------*/
?>
