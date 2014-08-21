<?php
$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name="appointment"; // Database name 
$tbl_name="registeration"; // Table name 
$dbArray = array();

mysql_connect("localhost",'root',"");
mysql_select_db('appointment');

// Connect to server and select databse.
$sql="SELECT * FROM $tbl_name ORDER BY regId ASC";
$result=mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	$string = $row['date'] . '|' . $row['time'] . '|' . $row['userId'] . '|' . $row['Doctor'];
	array_push($dbArray,$string);
}
$convertedArray = array_values($dbArray);

echo json_encode($convertedArray);

mysql_close();






?>