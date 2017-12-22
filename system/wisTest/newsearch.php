<?php
$conn = mysql_connect("localhost", "root", "root");

$keyword = $_POST['keyword'];
$submit = $_POST['submit'];
/*------------------------------
*function searchAgent is use searching for agent profile
*@param keyword is the keyword that will entered by the user 
*@return null if there is no entered value in the search box and the search button is triggered
*@return true if there is if there is value to be tested
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
/*--------------test area-------------------------------------*/
if(isset($submit)){
   $enterValue = $keyword;
   $expectedOutput = 1; 
   $expectedOutput2 = "1 or true";
   $result = searchAgent($keyword);
   
   echo "entered value: ".$enterValue."<br />"; 
   echo "expected output: <b>".$expectedOutput."</b><br />"; 
   echo "actual output: ".$result."<br />";
   
   if($result == $expectedOutput)
      echo "<h3>passed</h3>";
	else
	  echo "<h3>failed</h3>";
	  
	 
	 
}
/*--------------------end test-------------------------------------------*/
?>

<html>
<head>
</head>
<body>
<form method="POST" action="newsearch.php">
   <input type="text" name="keyword" value=""/>
   <input type="submit" name="submit" value="search"/>
</form>
</body>
</html>












