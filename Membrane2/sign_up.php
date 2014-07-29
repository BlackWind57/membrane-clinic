<?php
	$connection = mysql_connect("localhost", "root", "");
	if ( !$connection ) {
		die('Could not connect to localhost.');	
	}
	
	$db = mysql_select_db("appointment", $connection);
	if (!$db) {
		die ('Could not find database membrane');	
	}
	
	$insert_query = "INSERT INTO `appointment`.`user` (`userId`, `userName`, `password`, `firstName`, `lastName`, `age`, `phoneNum`, `email`) VALUES (NULL, '" . $_REQUEST['username'] ."','" . md5($_REQUEST['password']) ."','" . $_REQUEST['firstname'] ."','" . $_REQUEST['lastname'] ."','" . $_REQUEST['age'] ."','" . $_REQUEST['phone']  ."','" . $_REQUEST['email'] ."')";
	
	$result = mysql_query($insert_query, $connection);	
	if ($result == TRUE)
		echo json_encode('New record has successfully added. Please login to see your account details');
	else
		echo json_encode('Fail to add new record.');
		
	mysql_close($connection);
?>