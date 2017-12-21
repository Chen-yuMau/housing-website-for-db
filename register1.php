<?php
   session_start();
   $_SESSION['account']='';
   $_SESSION['name']='';
   $_SESSION['email']='';
?>
<!DOCTYPE html>
<html>
	
	<head>
		<link rel="stylesheet" href="index.css">
		<title>register</title>
	</head>
	
	<body>
	<br/><br/><br/>
	<h1><strong>Please Fill In The Following To Register</strong></h1>
 		<form action="register.php" method="post">
			<br/><br/>
			<input name="Account" placeholder="Account" type="text" required />
			<br/>
			<input name="Password1" placeholder="Password" type="password" required />
			<br/>
			<input name="Password2" placeholder="Confirm Password" type="password" required />
			<br/>
			<input name="Name" placeholder="Name" type="text" required />
			<br/>
			<input name="E-mail" placeholder="E-mail" type="e-mail" required />
			<br/>
			<input type="submit" value="Register" class="submit">
			<h1>Do you have an account already?<a href="index.html">log in</a></h1>
		</form>
	</body>
</html>