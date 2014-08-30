<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="generalStyle.css" rel="stylesheet" type="text/css" />
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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
            
            <div id="membership">
            	<span><p id="statusbox"><a href="login.php">Login</a> | <a href="register.php">Register</a></p></span>
            </div>
    	</div>
    	<div id="menu">
       	  	<a href="index.php"><img id="home" src="images/home.png" style="left:0;" name="_home" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_home','','images/home_hover.png',1)"/></a>
            <a href="about.php"><img id="about" src="images/about.png" style="left:120px;" name="_about" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_about','','images/about_hover.png',1)"/></a>
            <a href="doctor.php"><img id="doctor" src="images/doctor.png" style="left:240px"; name="_doctor" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_doctor','','images/doctor_hover.png',1)"/></a>
            <a href="faqs.php"><img id="faqs" src="images/faqs.png" style="left:360px;" name="_faqs" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_faqs','','images/faqs_hover.png',1)"/></a>
            <a href="appointment.php"><img id="appointment" src="images/appointment.png" style="left:480px;" name="_appointment" 
        onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('_appointment','','Images/appointment_hover.png',1)"/></a>
    	</div>
        <div id="content">
        	<div id="container">
            	<h2>Login</h2>
                <hr /><br />
            	<form action="includes/process_login.php" method="post" name="login_form"> 
                        <fieldset class="textbox">
                        <div>
                        <table width="600">                        
                            <tr>
                            <td width="150">E-Mail</td>
                            <td width="38">:</td>
                            <td width="434"><input type="text" name="email" /> </td>
                            </tr>
                            
                            <tr>
                            <td><label class="password">Password</label></td>
                            <td>:</td>
                            <td>
                            <input type="password" name="password" id="password"/></td>
                            </tr>
                            <tr>
                            <td colspan="3">
                            <?php
								if (isset($_GET['error'])) {
									echo '<p class="error">Error Logging In!</p>';
								}
							?> 
                            </td>
                            </tr>
                        </table>
                        </div>
                        <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
                        </fieldset>
                        <br />
                        
               		</form>
          		<br />
          		Not registered yet? <a href="register.php">Register</a> here
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
