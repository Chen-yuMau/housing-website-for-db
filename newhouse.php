<?php
   session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link type="text/css" rel="stylesheet" href="index.css">
  </head>
  <body>
      <table>
        <tbody>
            <?php
            	$hid=$_POST["create"];
				$name =  $_POST["name"];
				$price = $_POST["price"];
				$location = $_POST["location"];
				$date = date("Y-m-d");
				$owner_id = $_SESSION['id'];
				$db_host = "dbhome.cs.nctu.edu.tw";
				$db_name = "chymau_cs_a_firstdatabase";
				$db_user = "chymau_cs";
				$db_password = "12345678";
				$dsn = "mysql:host=$db_host;dbname=$db_name";
				$db = new PDO($dsn, $db_user, $db_password);
					if($hid == 1)
					{
						$stmt = $db->prepare("INSERT INTO  chymau_cs_a_firstdatabase.house(name, price, location, time, owner_id) VALUES (:name,:price,:location,:time,:owner_id) "); 
						$stmt->execute(array(':name'=>$name,':price'=>$price,':location'=>$location,':time'=>$date,':owner_id'=>$owner_id));$house_id = $db->lastinsertid();
						foreach($_POST['check_list'] as $info)
						{
							$house_sql = "INSERT INTO  chymau_cs_a_firstdatabase.information (information, house_id) VALUES ('$info','$house_id')";
							$house_rs = $db->query($house_sql);
						}
					}
					else
					{
						echo $hid;
						$stmt = $db->prepare("UPDATE chymau_cs_a_firstdatabase.house SET name=:name, price=:price, location=:location, time=:time, owner_id=:owner_id WHERE house.id = '$hid'");
						$stmt->execute(array(':name'=>$name,':price'=>$price,':location'=>$location,':time'=>$date,':owner_id'=>$owner_id));
						$house_sql = "DELETE FROM chymau_cs_a_firstdatabase.information WHERE house_id = '$hid'";
						$house_rs = $db->query($house_sql);
						foreach($_POST['check_list'] as $info)
						{
							$house_sql = "INSERT INTO  chymau_cs_a_firstdatabase.information (information, house_id) VALUES ('$info','$hid')";
							$house_rs = $db->query($house_sql);
						}
					}
					
						echo "<script>location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/housemanagement.php'; </script>";
						exit;
            ?>
        </tbody>
      </table>
  </body>
</html>