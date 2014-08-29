<?php
	$connection = mysql_connect("localhost", "root", "");
	if ( !$connection ) {
		die('Could not connect to localhost.');	
	}
	
	$db = mysql_select_db("appointment", $connection);
	if (!$db) {
		die ('Could not find database membrane');	
	}
	$date =  $_REQUEST['registDay'];
	$time = $_REQUEST['registTime'];
	$doctor = $_REQUEST['registDoctor'];
	
	$result =mysql_query("SELECT 1 FROM `registeration` WHERE `date` = '". $date ."' AND `time` = '". $time ."' AND `Doctor` = '". $doctor ."'");
	if ($result && mysql_num_rows($result) > 0)
	
		{
			echo json_encode("The room have been booked :("); 
		}
	else
		{
		$insert_query = "INSERT INTO `appointment`.`registeration` (`regId`, `date`, `time`, `userId`, `Doctor`) VALUES (NULL, '" . $date."','" . $time ."','1','" . $doctor ."')";
	
		$result = mysql_query($insert_query, $connection);
		if ($result == TRUE)
			echo json_encode("Room booked succesfully");
		else
			echo json_encode('Fail to add new record.');	
		}
	

		
	mysql_close($connection);
?>