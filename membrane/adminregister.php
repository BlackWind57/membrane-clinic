<?
session_start();
if($_SESSION['user']!=''){
 header("Location:adminhome.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="adminStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="hoverScripts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Admin</title>
</head>

<body>
    <div id="wrapper">
    	<div id="header">
        	<div id="logo">
            	<img src="images/logo.png" usemap="#Map" border="0" />
            	<map name="Map" id="Map">
              		<area shape="rect" coords="3,124,296,160" href="adminUI.html" />
            	</map>
            </div>
            
            <div id="membership">
            	<span><p><a href="includes/admin_logout.php">Log out</a></p></span>
            </div>
    	</div>
    	<div id="sidebar">
        	<h1>Menu</h1>
            <p>
            	<a href="userlist.php">User list</a> <br />
                <a href="appointmentlist.php">Appointment list</a> <br />
                <a href="adminlist.php">Admin list</a><br />
                <a href="adminregister.php">Register Admin</a>
            </p
        </div>
        <div id="content">
        <form action="adminregister.php" method="POST">
           <table width="600">                                               
                        <tr>
                        <td><label>E-mail Address</label></td>
                        <td>:</td>
                        <td><input name="user" /></td>
                        </tr>
                       
                        <tr>
                        <td><label>Password</label></td>
                        <td>:</td>
                        <td> <input name="pass" type="password"/></td>
                        </tr>
           	</table>
         	<button name="submit">Register</button>
            </form>
            <?php
			  if(isset($_POST['submit'])){
			   $dbh=new PDO('mysql:dbname=membrane;host=localhost', 'root', '');
			   if(isset($_POST['user']) && isset($_POST['pass'])){
				$password=$_POST['pass'];
				$sql=$dbh->prepare("SELECT COUNT(*) FROM `admins` WHERE `username`=?");
				$sql->execute(array($_POST['user']));
				if($sql->fetchColumn()!=0){
				 die("User Exists");
				}else{
				 function rand_string($length) {
				  $str="";
				  $chars = "abcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				  $size = strlen($chars);
				  for($i = 0;$i < $length;$i++) {
				   $str .= $chars[rand(0,$size-1)];
				  }
				  return $str;
				 }
				 $p_salt = rand_string(20);
				 $site_salt="membranesalt";
				 $salted_hash = hash('sha256', $password.$site_salt.$p_salt);
				 $sql=$dbh->prepare("INSERT INTO `admins` (`id`, `username`, `password`, `psalt`) VALUES (NULL, ?, ?, ?);");
				 $sql->execute(array($_POST['user'], $salted_hash, $p_salt));
				 echo "Successfully Registered.";
				}
			   }
			  }
			  ?>
        </div>
        <div id="footer">
        	<span>
            	<p>
                	
            		Address: 123 Sandy Street, Zilgerton, Cairnsville | Phone: 07 4774 1234 | Fax: 07-4774 4321 | E-mail: mc_contact@gmail.com 
            	</p>
            </span>
        </div>
	</div>
</body>
</html>