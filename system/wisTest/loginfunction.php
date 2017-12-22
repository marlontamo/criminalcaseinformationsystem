<?php
//session_start();
mysql_connect('localhost','root','root');
//require_once('connection.php');

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
    //if(!$this->CheckLoginInDB($username,$password)) {
       // return false;
    //}
     
   // session_start();
     
    //$_SESSION[$this->GetLoginSessionVar()] = $username;
     
    
}
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];


$data = Login($username, $password);
  
  
}
/**---------------------------------end--------------------------------------------------------------- 
 function CheckLoginInDB($username,$password)
{
    if(!$this->DBLogin())
    {
        $this->HandleError("Database login failed!");
        return false;
    }          
    $username = $this->SanitizeForSQL($username);
    $pwdmd5 = md5($password);
	$qry="SELECT * FROM admin WHERE employeeName='$username' AND password='$password'";
   
     
    $result = mysql_query($qry,$this->connection);
     
    if(!$result || mysql_num_rows($result) <= 0)
    {
        $this->HandleError("Error logging in. ".
            "The username or password does not match");
        return false;
    }
    return true;
}*/
 
?>
<html>
<head></head>
<body>
<form id='login' action='loginfunction.php' method='post' >
<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
 
<label for='username' >UserName*:</label>
<input type='text' name='username' id='username'  maxlength="50" />
 
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
 
<input type='submit' name='submit' value='Submit' />
 
</fieldset>
</form>
</body>
</html>