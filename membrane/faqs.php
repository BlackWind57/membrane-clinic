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
<title>FAQS</title>
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
            <a href="doctor.php"><img id="doctor" src="images/doctor.png" style="left:240px"; name="_doctor" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_doctor','','images/doctor_hover.png',1)"/></a>
            <a href="faqs.php"><img id="faqs" src="images/faqs_selected.png" style="left:360px;" name="_faqs" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_faqs','','images/faqs_selected.png',1)"/></a>
            <a href="appointment.php"><img id="appointment" src="images/appointment.png" style="left:480px;" name="_appointment" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_appointment','','Images/appointment_hover.png',1)"/></a>
    	</div>
        <div id="content">
        	<div id="container">
        		<h1>Frequently asked questions </h1>
        		<h2>How do I request an appointment online?</h2>
       		 	<p>
        			You have to register first, under the register link on top right of the website. After a successful registration, you have to login. Then click the "Enroll" tab in the menu, choose one of the doctors to request an appointment with the doctor. We recommend you to read the doctors' info from "Doctor" tab in the menu first.
        		</p>
        		<h2>Can Membrane Clinic provider prescribe medications?</h2>
        		<p>
        			Yes, but only if the condition/diagnosis requires a prescription for treatment based on the provider’s assessment. Narcotic and other controlled substances are not prescribed at Membrane Clinic.
        		</p>
        		<h2>Does Membrane Clinic accept my health insurance plan?</h2>
        		<p>
        			Membrane Clinic accepts most insurance plans and networks. Please contact your insurance carrier prior to your visit to verify coverage, co-pay responsibility and that your insurance plan is participating with Membrane Clinic. Confirming this information in advance will help avoid any unforeseen charges.
        		</p>
        		<h2>What if I don't have health insurance or have a plan that Membrane Clinic doesn't currently accept?</h2>
        		<p>
        			No problem. You have the option to pay for your visit by debit card, major credit card, money order or traveler’s checks.
        		</p>
        		<h2>What form of payment does Membrane Clinic accept?</h2>
        		<p>
        			Membrane Clinic accepts debit card, MasterCard, Visa, money order and traveler’s checks.
        		</p>
        	</div>
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
