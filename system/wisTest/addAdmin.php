<?php
$conn = mysql_connect('localhost','root','root');
if($conn )
echo "connected to localhost <br/>";
else
echo "connot connect<br />";

$db = mysql_select_db('dbmarlon');
if($db)
echo "connected<br/>";
else 
echo "error<br/>"; 

if(isset($_POST["submit"])){
$adminid = $_POST["adminid"];
$empName = $_POST["empName"];
$password = $_POST["pass"];


$sql = mysql_query("INSERT INTO admin (adminNo,employeeName,password) VALUES ('$adminid','$empName','$password')");
if($sql)
echo addslashes($empName);

else
echo "could not insert<br/>";
}

?>
<html><head></head>

<body>
<form method="POST" action="addAdmin.php">
adminId:<input type="text" name="adminid" value=""/><br/>
employee Name:<input type="text" name="empName" value=""/><br/>
password:<input type="text" name="pass" value=""/><br/>
<input type="submit" name="submit" value="submit"/><br/>
</form>


</body></html>