<?php
	include_once 'includes/register.inc.php';
	include_once 'includes/functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="generalStyle.css" rel="stylesheet" type="text/css" />
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script>
    <script type="text/javascript" src="js/hoverScripts.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Register</title>
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
            	<span><p><a href="login.php">Login</a> | <a href="register.php">Register</a></p></span>
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
            	<h2>Registration</h2>
                <hr /><br />
                
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
                    <fieldset>
                    <legend>Account Information</legend>
                    <div>
                    Passwords must contain
                        	<ul>
                                <li>At least one upper case letter (A..Z)</li>
                                <li>At least one lower case letter (a..z)</li>
                                <li>At least one number (0..9)</li>
                            </ul>   
                    <table width="895">                        
                        <tr>
                        <td width="175"><label>Username</label></td>
                        <td width="25">:</td>
                        <td width="397"><input type='text' name='username' id='username' /></td>
                        </tr>
                        
                        <tr>
                        <td><label>E-mail Address</label></td>
                        <td>:</td>
                        <td><input type="text" name="email" id="email" /></td>
                        </tr>
                       
                        <tr>
                        <td><label>Password</label></td>
                        <td>:</td>
                        <td> <input type="password" name="password" id="password"/></td>
                        </tr>
                        
                        <tr>
                        <td><label>Confirm Password</label></td>
                        <td>:</td>
                        <td><input type="password" name="confirmpwd" id="confirmpwd" /></td>
                        </tr>                                       
                    </table>
                    </div>
                    </fieldset>
                    
                    
                    <br />
                    
                   <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
                    <input name="reset" type="reset" value="RESET" />
                </form>
                <br/>
                Already a member? <a href="login.php">Login</a> here
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