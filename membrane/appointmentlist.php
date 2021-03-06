<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="adminStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="hoverScripts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
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
            	<span><p><a href="admin_logout.php">Logout</a></p></span>
            </div>
    	</div>
    	<div id="sidebar">
        	<h1>Menu</h1>
            <p>
            	<a href="userlist.php">User list</a> <br />
                <a href="appointmentlist.php">Appointment list</a> <br />
                <a href="adminlist.php">Admin list</a><br />
                <a href="adminregister.php">Register Admin</a>
            </p>
        </div>
        <div id="content" style="text-align:center;">
        	<h1>User List</h1>
            <hr/><br/>
                <?php
                    $con=mysqli_connect("localhost", "root", "","membrane");
                    // Check connection 
                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to Database: " . mysqli_connect_error();
                    }
                    
                    $result = mysqli_query($con,"SELECT * FROM appointment");
                   
                   echo "<table border='2' align='center'>
					<tr>
                    <th>Reg ID</th>
                    <th>Date</th>
                    <th>Time</th>
					<th>Doctor</th>
                    <th>Patient Name</th>
                    <th>Patient Phone</th>
					<th>Patient Age</th>                   
                    </tr>";
                    
                    while($row = mysqli_fetch_array($result))
					{
                      echo "<tr>";
                      echo "<td>" . $row['regId'] ."</td>";
                      echo "<td>" . $row['date'] ."</td>";                     
                      echo "<td>" . $row['time'] ."</td>";
					  echo "<td>" . $row['doctor'] ."</td>";
                      echo "<td>" . $row['patientname'] ."</td>";                     
                      echo "<td>" . $row['patientphone'] ."</td>";
					  echo "<td>" . $row['patientage'] ."</td>";
                      echo "</tr>";
                    }
                    
                    echo "</table>";
                    
                    mysqli_close($con);
    			?>
                <p />
                
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
