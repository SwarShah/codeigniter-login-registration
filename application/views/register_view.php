<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>New user registration</title>
   <?php 
   $this->load->helper('html');
   $this->load->helper('url'); 
   ?>
        <style>
		html{
			background-color: RGB(55,66,87);
		}
		body{
			background-color: RGB(238,232,218);
			height: 500px;
			width: 500px;
			margin: auto;
		}
		h1{
			background-color: RGB(112,85,81);
			}
		input[type="text"],[type="password"] {
			border: solid 1px #dcdcdc;
			transition: box-shadow 0.3s, border 0.3s;
			margin-right: 2em;
			width:20em;
		}
		
		label{
				float:left;
				width: 8em;			
				text-align:right;	
				margin-left: 30px;
			}

   </style>
  
 </head>
 <body>
 <center>
   <h1>Register</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifyregister'); ?>
     <label for="email">Email:</label>
     <input type="text" size="20" id="email" name="email"  value="<?php echo $this->input->post('email') ?>" />
     <br>
     <label for="firstname">First name:</label>
     <input type="text" size="20" id="firstname" name="firstname"  value="<?php echo $this->input->post('firstname') ?>"/>
     <br>
     <label for="lastname">Last name:</label>
     <input type="text" size="20" id="lastname" name="lastname" value="<?php echo $this->input->post('lastname') ?>"/>
     <br>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
	 <br>
     <label for="confirm_password">Confirm Password:</label>
     <input type="password" size="20" id="confirm_password" name="confirm_password"/>
     <br>
	 <label for="hint">Hint:</label>
     <input type="text" size="20" id="hint" name="hint" value="<?php echo $this->input->post('hint') ?>" />
     <br><br>
     <input type="submit" value="Register"/>
	 <br>
	 <?php echo anchor('forget','Forgot your password?'); echo " | " ?>
	<?php echo anchor('login','Login');
		echo form_close();?>

  </center>
 </body>
</html>