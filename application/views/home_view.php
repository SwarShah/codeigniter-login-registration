<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
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

   </style>
 </head>
 <body>
 <center>
   <h1>Home</h1>
   <h2>Welcome <?php echo $firstname." ".$lastname; ?>!</h2>
   <a href="home/logout">Logout</a>
  </center>
 </body>
</html>