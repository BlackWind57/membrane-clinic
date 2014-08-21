<?php
$connection = mysql_connect("localhost", "root", "");
if ( !$connection ) {
	die('Could not connect to localhost.');	
}

$db = mysql_select_db("appointment", $connection);
if (!$db) {
	die ('Could not find database membrane');	
}

$memberUsername = $_POST['memberUsername'];
$memberPassword = $_POST['memberPassword'];


//mysql injection protection
$memberUsername = stripslashes($memberUsername);
$memberPassword = stripslashes($memberPassword);
$memberUsername = mysql_real_escape_string($memberUsername);
$memberPassword = mysql_real_escape_string($memberPassword);

$md5pass = password_hash("$memberPassword", PASSWORD_DEFAULT);


$sqlquery = "SELECT * FROM `user` WHERE `username` = '$memberUsername' AND `password` = '$md5pass'";

$result = mysql_query($sqlquery);

$count = mysql_num_rows($result);
if($count == 1){
	session_start();
	$_SESSION['username'] = $memberUsername;
	$_SESSION['password'] = $md5pass;
	//header("location: loginSuccessful.php");
	echo json_encode(array_values(array($memberUsername, $md5pass)));
}
else{
	echo json_encode('');	
}
?>