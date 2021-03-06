<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="generalStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/hoverScripts.js"></script>
<script type="text/javascript" src="js/BookingSchedule.js"></script>
<link href="scheduleStyle.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Appointment</title>
</head>

<body>
<div id="wrapper">
	<?php if (login_check($mysqli) == true) : ?>
            <div id="header">
                <div id="logo">
                    <img src="images/logo.png" usemap="#Map" border="0" />
                    <map name="Map" id="Map">
                        <area shape="rect" coords="3,124,296,160" href="index.html" />
                    </map>
                </div>
                
                <div id="membership">
                    <span> <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>! | <a href="includes/logout.php">log out</a></p></span>
                </div>
            </div>
            <div id="menu">
                <a href="index.html"><img id="home" src="images/home.png" style="left:0;" name="_home" 
            onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_home','','images/home_hover.png',1)"/></a>
                <a href="about.html"><img id="about" src="images/about.png" style="left:120px;" name="_about" 
            onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_about','','images/about_hover.png',1)"/></a>
                <a href="doctor.html"><img id="doctor" src="images/doctor.png" style="left:240px"; name="_doctor" 
            onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_doctor','','images/doctor_hover.png',1)"/></a>
                <a href="faqs.html"><img id="faqs" src="images/faqs.png" style="left:360px;" name="_faqs" 
            onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_faqs','','images/faqs_hover.png',1)"/></a>
                <a href="appointment.php"><img id="appointment" src="images/appointment_selected.png" style="left:480px;" name="_appointment" 
            onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_appointment','','Images/appointment_selected.png',1)"/></a>
            </div>
            <div id="content">
                <div id="form" style="text-align:center;">
                    <label>Name</label>
                    <input type="text" id="name" />
                    <label>Phone</label>
                    <input type="text" id="phone" />
                    <label>Age</label>
                    <input type="text" id="age" />
                </div>
            	
                <div id="doctorSelection">
                    <select name = select id = doctorSelect onchange ="onChange()">
                        <option>Dr.Toefu Wao,M.D.</option>
                        <option>Dr.Hotler Rious,M.D.</option>
                    </select>
                </div>
                <div id="schedule">
                </div>
                <div id="navPanel">
                    <img src="Images/leftarrow.png" onclick="lastWeek()" />
                    <img src="Images/rightarrow.png" onclick="nextWeek()" />
                </div>
            </div>
            <?php else : ?>
    	<div id="header">
        	<div id="logo">
            	<img src="images/logo.png" usemap="#Map" border="0" />
            	<map name="Map" id="Map">
              		<area shape="rect" coords="3,124,296,160" href="index.html" />
            	</map>
            </div>
            
            <div id="membership">
            	<span><p id="statusbox"><a href="login.php">Login</a> | <a href="register.php">Register</a></p></span>
            </div>
    	</div>
    	<div id="menu">
       	  	<a href="index.html"><img id="home" src="images/home.png" style="left:0;" name="_home" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_home','','images/home_hover.png',1)"/></a>
            <a href="about.html"><img id="about" src="images/about.png" style="left:120px;" name="_about" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_about','','images/about_hover.png',1)"/></a>
            <a href="doctor.html"><img id="doctor" src="images/doctor.png" style="left:240px"; name="_doctor" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_doctor','','images/doctor_hover.png',1)"/></a>
            <a href="faqs.html"><img id="faqs" src="images/faqs.png" style="left:360px;" name="_faqs" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_faqs','','images/faqs_hover.png',1)"/></a>
            <a href="appointment.html"><img id="appointment" src="images/appointment.png" style="left:480px;" name="_appointment" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_appointment','','Images/appointment_hover.png',1)"/></a>
    	</div>
        <div id="content">
        	<div id = "error"> 
            	<p class="warning">You are not authorized to access this page.</p>
            
            	Please <a href="login.php">login</a>
            </div>
        </div>
         <?php endif; ?>
            <div id="footer">
                <span>
                    <p>
                        <br />
                        Address: 123 Sandy Street, Zilgerton, Cairnsville | Phone: 07 4774 1234 | Fax: 07-4774 4321 | E-mail: mc_contact@gmail.com 
                    </p>
                </span>
            </div>
        </div>
</body>
</html>
