<?php
$con=mysqli_connect("localhost","root","","membrane");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$adminid = mysqli_real_escape_string($con, $_POST['admin']);
$password = mysqli_real_escape_string($con, $_POST['pass']);


$sql="INSERT INTO `membrane`.`admin` (`id`, `username`, `passcode`) VALUES (NULL, '$adminid', '$password')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";
header("location: adminUI.php");

mysqli_close($con);
?> 