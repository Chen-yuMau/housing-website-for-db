<?php
   session_start();
?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>delete</title>
	</head>
	
	<body>
	<?php
		$usernow = $_SESSION['id'];
		$ac=$_POST['add_favorite'];
		$db_host = "dbhome.cs.nctu.edu.tw";
		$db_name = "chymau_cs_a_firstdatabase";
		$db_user = "chymau_cs";
		$db_password = "12345678";
		$dsn = "mysql:host=$db_host;dbname=$db_name";
		$db = new PDO($dsn, $db_user, $db_password);
		//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    	$sqlinsert = "INSERT INTO `chymau_cs_a_firstdatabase`.`favorite` (user_id, favorite_id) VALUES ('$usernow', '$ac')";
		$favorite_rs = $db->query($sqlinsert);
    // use exec() because no results are returned
    	$db->exec($sql);
    	$db = null;
    	echo "<script> location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/homepage.php'; </script>";
	?>
	</body>
</html>