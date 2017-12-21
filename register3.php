<?php
   session_start();
?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>register</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link type="text/css" rel="stylesheet" href="index.css">
	</head>
	
	<body>
	<?php
		$account = $_SESSION['new_account'];
		$password1 = $_SESSION['new_password1'];
		$password2 = $_SESSION['new_password2'];
		$name = $_SESSION['new_name'];
		$email = $_SESSION['new_email'];
	?>
	<br/><br/><br/>
	<h1><strong>Please Fill In The Following To Register</strong></h1>
 		<form action="register.php" method="post">
			<br/><br/>
			<input name="Account" value=<?php echo $_SESSION['new_account']?> type="text" required />
			<br/>
			<input name="Password1" placeholder=<?php echo $_SESSION['new_password1']?> type="password" required />
			<br/>
			<input name="Password2" placeholder=<?php echo $_SESSION['new_password2']?> type="password" required />
			<br/>
			<input name="Name" value=<?php echo $_SESSION['new_name']?> required />
			<br/>
			<input name="E-mail" value=<?php echo $_SESSION['new_email']?> type="e-mail" required />
			<br/>
			
			<?php
				if($_SESSION['account'] == null)
				{
			?>
			<button name="create" type="submit" value="1" class="submit">Register</button>
			<h1>Do you have an account already?<a href="index.html">log in</a></h1>
			<?php
				}
				else
				{
			?>
					<button name="create" class="submit" type="submit" value="1" >Create as User</button>
					<button name="create" class="submit" type="submit" value="2" >Create as Admin</button>
			<?php
				}
			?>
		</form>
	</body>
</html>