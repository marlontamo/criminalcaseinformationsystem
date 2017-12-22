<?php
function deleteSuspect($suspect_name){

$sql="DELETE * FROM suspect WHERE suspectNo ='" .$suspect_name. "';";
			$result=mysql_query($sql);
			if ($result){
				return true;
			}else{
				die ("error in sql query" . mysql_error()); 
			}
}
?>

