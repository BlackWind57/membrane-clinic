<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="adminStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="hoverScripts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin List</title>
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
            	<span><p>Logout</p></span>
            </div>
    	</div>
    	<div id="sidebar">
        	<h1>Menu</h1>
            <p>
            	<a href="userlist.php">User list</a> <br />
                <a href="appointmentlist.php">Appointment list</a> <br />
                <a href="adminlist.php">Admin list</a>
            </p>
        </div>
        <div id="content">
       			<?php
                    $con=mysql_connect("localhost", "root", "","appointment");
                    // Check connection 
                    if (mysqli_connect_errno()) {
                      echo "Failed to connect to Database: " . mysqli_connect_error();
                    }
                    
                    $result = mysql_query($con,"SELECT * FROM admin");
                   
                   echo "<table border='2' align='center'>
					<tr>
                    <th>admin ID</th>
                    <th>admin name</th>              
                    </tr>";
                    
                    while($row = mysqli_fetch_array($result))
					{
                      echo "<tr>";
                      echo "<td>" . $row['adminId'] ."</td>";
                      echo "<td>" . $row['adminame'] ."</td>";
                      echo "</tr>";
                    }
                    
                    echo "</table>";
                    
                    mysqli_close($con);
    			?>
               
             	<form action="registerAdmin.html">
    				<input type="submit" value="register Admin">
				</form>
                <form name="input" action="deleteAdmin.php" method="get">
                Username: <input type="number" name="idUserDel">
            	<input type="submit" value="Delete User">
            	</form> 
        	
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
