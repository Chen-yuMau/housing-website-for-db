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
		<title>Homepage</title>
	</head>
	
	<body>
	<br/><br/><br/><br/>
	<h1><strong>Brian's and Sam's Website</strong></h1>
		<br/><br/><br/><br/><br/><br/><br/>
 			<form action="login.php" method="post">
				<input name="Account" placeholder="Account" type="text" required />
				<br/>
				<input name="Password" placeholder="Password" type="password" required />
				<br/>
				<input type="submit" value="Sign In" class="submit"><br/><br/>
			</form>
			<form action="register.html" method="post">
				<input type="submit" value="Create Account" class="submit">
			</form>
	</body>
</html>