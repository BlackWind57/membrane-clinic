<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
if($_SESSION['user']==''){
 header("Location:adminlogin.php");
}else{
 $dbh=new PDO('mysql:dbname=membrane;host=localhost', 'root', '');
 $sql=$dbh->prepare("SELECT * FROM admins WHERE id=?");
 $sql->execute(array($_SESSION['user']));
 while($r=$sql->fetch()){
  echo "<center><h2>Hello, ".$r['username']."</h2></center>";
 }
}
?>
</body>
</html>
</html>