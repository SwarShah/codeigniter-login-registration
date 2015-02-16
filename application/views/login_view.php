<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login</title>
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
		}
   </style>
 </head>
 <body>
 <center>
   <h1>CPD 2374 - Term Project</h1>
   <?php echo validation_errors(); 
		if(isset($account_created))
		{ 
			echo $account_created;
		}?>
   <?php echo form_open('verifylogin'); ?>
	
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
	 <?php 
		$this->load->helper('captcha'); 
		$vals = array(
		'img_path'	=> 'application/captcha/',
		'img_url'	=> base_url().'application/captcha/',
		'img_width'	=> '220',
		'img_height' => 50,
		'expiration' => 7200
		);
		$cap = create_captcha($vals);
		echo $cap['image'];
		$data = array(
		'captcha_time' => $cap['time'],
		'ip_address' => $this->input->ip_address(),
		'word' => $cap['word']
		);		
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
	?>
	
	 <br><input type="text" size="20" id="captcha" name="captcha"/>
	 <br>
	 <p><input type="checkbox" name="remember"/>
	 Remember me</p>
	<input type="submit" value="Login"/><br>	 
	<?php echo anchor('register','New Registration'); echo " | " ?>
	<?php echo anchor('forget','Forgot your password?'); 
	echo form_close();?>
  </center>
 </body>
</html>