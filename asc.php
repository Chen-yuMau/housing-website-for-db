<?php
   session_start();
?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>asc</title>
	</head>
	
	<body>
	<?php
		$usernow = $_SESSION['id'];
		$ac=$_POST['ASC'];
		$db_host = "dbhome.cs.nctu.edu.tw";
		$db_name = "chymau_cs_a_firstdatabase";
		$db_user = "chymau_cs";
		$db_password = "12345678";
		$dsn = "mysql:host=$db_host;dbname=$db_name";
		$db = new PDO($dsn, $db_user, $db_password);
		if($ac == '1')
		{
			$_SESSION['house'] = $_SESSION['house_asc_p'];
		}
		else if($ac == '2')
		{
			$_SESSION['house'] = $_SESSION['house_asc_t'];
		}
		echo "<script> location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/homepage.php'; </script>";
	?>
	</body>
</html>