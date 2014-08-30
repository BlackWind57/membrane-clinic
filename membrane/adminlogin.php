<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="adminLoginStyle.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
</head>

<body>
	
    <div id="wrapper">
    	<div id="logo">
        	<img src="images/login_logo.png" height="37" width="300"/>
        </div>
        <div id="login">
            	<form method="POST" action="adminlogin.php">
                        <div>
                        <table width="400">                        
                            <tr>
                            <td width="150"><label>E-mail</label></td>
                            <td width="38">:</td>
                            <td width="200"><input size="25" name="mail" type="text"> </td>
                            </tr>
                            
                            <tr>
                            <td><label>Password</label></td>
                            <td>:</td>
                            <td>
                            <input name="pass" size="25" type="password"></td>
                            </tr>                
                        </table>
                        </div>
                        <br />
                        
                        <div class="submit">
                        <input type="submit" name="Submit" value="Login">
                        <input name="reset" type="reset" value="Reset" />
                        </div>
                   <?php
					session_start();
					if($_SESSION['user']!=''){header("Location:adminhome.php");}
					$dbh=new PDO('mysql:dbname=membrane;host=localhost', 'root', '');
					$email=$_POST['mail'];
					$password=$_POST['pass'];
					if(isset($_POST) && $email!='' && $password!=''){
					 $sql=$dbh->prepare("SELECT id,password,psalt FROM admins WHERE username=?");
					 $sql->execute(array($email));
					 while($r=$sql->fetch()){
					  $p=$r['password'];
					  $p_salt=$r['psalt'];
					  $id=$r['id'];
					 }
					 $site_salt="membranesalt";
					 $salted_hash = hash('sha256',$password.$site_salt.$p_salt);
					 if($p==$salted_hash){
					  $_SESSION['user']=$id;
					  header("Location:adminhome.php");
					 }else{
					  echo "<h2>Username/Password is Incorrect.</h2>";
					 }
					}
					?>
          		</form>
        </div>
    </div>
</body>
</html>
