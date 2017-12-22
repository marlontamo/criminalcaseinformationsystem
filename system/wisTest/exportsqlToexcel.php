<?php
if(isset($_POST['submit']))
{
	$conn = mysql_connect("localhost","root","root") or die(mysql_error());
	$konek = mysql_select_db("marlon", $conn);
   
	/*uploads = folder to put the file
	   strtotime() =php function so that everytime we upload files it will have different names
	*/
	$filename = 'uploads/'.strtotime("now").'.csv';
	
	
	
	$sql = mysql_query("SELECT * FROM table1") or die(mysql_error());
	$num_rows = mysql_num_rows($sql);
	
	if($num_rows >= 1)
	{
	$row = mysql_fetch_assoc($sql);
	$fp = fopen($filename, "w");
	
	$separator = "";
	$coma = "";
	
	foreach($row as $name => $value)
	{
		$separator .= $coma . '' .str_replace('','""', $name);
		$coma = ",";
	}
	$separator .= "\n";
	
	}
	fputs($fp, $separator);
	
	mysql_data_seek($sql, 0);
	while($row = mysql_fetch_assoc($sql))
	{
	$separator = "";
	$coma = "";
	foreach($row as $name => $value)
	{
		$separator .= $coma . '' .str_replace('','""', $value);
		$coma = ",";
	}
	$separator .= "\n";
	fputs($fp, $separator);
	}
	//fclose($fp);
}
?>
<html><head></head><body>
<form method="post" action="exportsqlToexcel.php">
<input type="submit" name="submit" value="submit"/>
</form>
</body></head>