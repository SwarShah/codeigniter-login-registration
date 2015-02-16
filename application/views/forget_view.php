<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Forgot Password</title>
   <?php 
   $this->load->helper('html');
   $this->load->helper('url'); ?>
      <style>
		html{
			background-color: RGB(55,66,87);
		}
		body{
			background-color: RGB(238,232,218);
			height: 300px;
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
   <?php echo heading('Forgot Password'); ?>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifyforget'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" value="<?php echo $this->input->post('username') ?>" /><br>
     <label for="hint">Hint:</label>
     <input type="text" size="20" id="hint" name="hint"/><br><br>
	 <input type="submit" value="Submit"/><br>
	 <?php echo anchor('register','New Registration'); echo " | " ?>
	<?php echo anchor('login','Login'); 
	echo form_close();?>   
  </center>
 </body>
</html>