<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="generalStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="hoverScripts.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctors</title>
</head>

<body>
    <div id="wrapper">
    	<div id="header">
        	<div id="logo">
            	<img src="images/logo.png" usemap="#Map" border="0" />
            	<map name="Map" id="Map">
              		<area shape="rect" coords="3,124,296,160" href="index.php" />
            	</map>
            </div>
            
            <?php if (login_check($mysqli) == true) : ?>
            <div id="membership">
                    <span> <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>! | <a href="includes/logout.php">log out</a></p></span>
                </div>
            <?php else : ?>
            <div id="membership">
            	<span><p id="statusbox"><a href="login.php">Login</a> | <a href="register.php">Register</a></p></span>
            </div>
            <?php endif; ?>
    	</div>
    	<div id="menu">
       	  	<a href="index.php"><img id="home" src="images/home.png" style="left:0;" name="_home" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_home','','images/home_hover.png',1)"/></a>
            <a href="about.php"><img id="about" src="images/about.png" style="left:120px;" name="_about" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_about','','images/about_hover.png',1)"/></a>
            <a href="doctor.php"><img id="doctor" src="images/doctor_selected.png" style="left:240px"; name="_doctor" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_doctor','','images/doctor_selected.png',1)"/></a>
            <a href="faqs.php"><img id="faqs" src="images/faqs.png" style="left:360px;" name="_faqs" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_faqs','','images/faqs_hover.png',1)"/></a>
            <a href="appointment.php"><img id="appointment" src="images/appointment.png" style="left:480px;" name="_appointment" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_appointment','','Images/appointment_hover.png',1)"/></a>
    	</div>
        <div id="content">
        	<a href="hotler.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_hotler','','images/hotler.png',1)">
        	<div id="doctorlist">
            	<div id="doctor_img"><img src="images/hotler_unhovered.png" width="156px" height="160px" name="_hotler"/> </div>
            	
                <div id="doctor_name"><h1> Dr. Hotler Rious, M.D. </h1></div>
            </div>
            </a>
            <a href="toefu.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_toefu','','images/toefu.png',1)">
           	<div id="doctorlist">
            	<div id="doctor_img"><img src="images/toefu_unhovered.png" width="156px" height="160px" name="_toefu"/> </div>
            	
                <div id="doctor_name"><h1> Dr. Toefu Wao, M.D. </h1></div>
            </div>
            </a>
        </div>
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
