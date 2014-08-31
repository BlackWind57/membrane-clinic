<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="adminLoginStyle.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
</head>

<body>
<?php
include("includes/admin_config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=mysqli_real_escape_string($db,$_POST['username']);
$mypassword=mysqli_real_escape_string($db,$_POST['password']);

$sql="SELECT * FROM `admin` WHERE `username` = '$myusername' AND `passcode` = '$mypassword' ";
$result=mysqli_query($db,$sql);


// If result matched $myusername and $mypassword, table row must be 1 row
if($result==true)
{
header("location: adminUI.php");
}
else
{
$error="Your Login Name or Password is invalid";
}
}
?>	
    <div id="wrapper">
    	<div id="logo">
        	<img src="images/login_logo.png" height="37" width="300"/>
        </div>
        <div id="login">
            	<form method="post" action="">
                        <div>
                        <table width="400">                        
                            <tr>
                            <td width="150"><label>E-mail</label></td>
                            <td width="38">:</td>
                            <td width="200"><input type="text" name="username"/> </td>
                            </tr>
                            
                            <tr>
                            <td><label>Password</label></td>
                            <td>:</td>
                            <td>
                            <input type="password" name="password"/></td>
                            </tr>                
                        </table>
                        </div>
                        <br />
                        
                        <div class="submit">
                        <input type="submit" name="Submit" value="Login">
                        <input name="reset" type="reset" value="Reset" />
                        </div>
          		</form>
        </div>
    </div>
</body>
</html>
