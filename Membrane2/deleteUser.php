<?php
$connection = mysql_connect("localhost", "root", "");
	if ( !$connection ) {
		die('Could not connect to membrane database.');	
	}
	
	$db = mysql_select_db("appointment", $connection);
	if (!$db) {
		die ('Could not find database membrane');	
	}
	/* get user it to be deleted */
	$delete_query = "DELETE FROM `admin` WHERE `adminId` = '" . $_GET['idUserDel'] ."'";
	
	mysql_query($delete_query, $connection);
	
	mysql_close($connection);
	
?> 