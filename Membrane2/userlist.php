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
            	<span><p>Logout</p></span>
            </div>
    	</div>
    	<div id="sidebar">
        	<h1>Menu</h1>
            <p>
            	<a href="userlist.html">User list</a> <br />
                <a href="appointmentlist.html">Appointment list</a> <br />
                <a href="adminlist.html">Admin list</a>
            </p>
        </div>
        <div id="content">
        	<h1>User List</h1>
            <hr/><br />
                <?php
                $host="localhost"; // Host name 
				$username=""; // Mysql username 
				$password=""; // Mysql password 
				$db_name="appointment"; // Database name 
				$tbl_name="user"; // Table name 
				
				mysql_connect("localhost",'root',"");
				mysql_select_db('appointment');
				
				// Connect to server and select databse.

				$sql="SELECT * FROM $tbl_name ORDER BY userId ASC";
				$result=mysql_query($sql);
				?>
                <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
				<tr>

                    <td width="53%" align="center" bgcolor="#E6E6E6"><strong>User ID</strong></td>
                    <td width="15%" align="center" bgcolor="#E6E6E6"><strong>User Name</strong></td>
                    <td width="13%" align="center" bgcolor="#E6E6E6"><strong>First name</strong></td>
                    <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Last name</strong></td>
                    <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Age</strong></td>
                    <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Phone Number</strong></td>
                    <td width="13%" align="center" bgcolor="#E6E6E6"><strong>E-mail</strong></td>
               	</tr>
				
                <?php
 
				// Start looping table row
				while($row=mysql_fetch_array($result)){
				
				?>
                <tr>
                    <td bgcolor="#FFFFFF"><?php echo $row['userId']; ?></td>
                    <td><?php echo $row['username']; ?><BR></td>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['lastName'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['phoneNum'];?></td>
                    <td><?php echo $row['email'];?></td>
                    
                </tr>
                <?php
                // Exit looping and close connection 
                }
                mysql_close();
                ?>
                </table>
        <div id="footer">
            <span>
                <p>
                
                    Address: 123 Sandy Street, Zilgerton, Cairnsville | Phone: 07 4774 1234 | Fax: 07-4774 4321 | E-mail: mc_contact@gmail.com 
                </p>
            </span>
        </div>
</body>
</html>
