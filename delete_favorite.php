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

		$ac=$_POST['delete_favorite'];
		$db_host = "dbhome.cs.nctu.edu.tw";
		$db_name = "chymau_cs_a_firstdatabase";
		$db_user = "chymau_cs";
		$db_password = "12345678";
		$dsn = "mysql:host=$db_host;dbname=$db_name";
		$db = new PDO($dsn, $db_user, $db_password);
		//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    	$sql = "DELETE FROM favorite WHERE id= '$ac' ";

    // use exec() because no results are returned
    	$db->exec($sql);
    	$db = null;
    	echo "<script> location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/user.php'; </script>";
	?>
	</body>
</html>