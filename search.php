<?php
   session_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Search</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link type="text/css" rel="stylesheet" href="index.css">
  </head>
  <body>
      <table>
        <tbody>
            <?php
				$id = $_POST["id"];
				$name = $_POST["name"];
				$price = $_POST["price"];
				$location = $_POST["location"];
				$time = $_POST["time"];
				$owner = $_POST["owner"];
				$information = $_POST["information"];
				
				$_SESSION['search_id']=$id;
				$_SESSION['search_name']=$name;
				$_SESSION['search_price']=$price;
				$_SESSION['search_location']=$location;
				$_SESSION['search_time']=$time;
				$_SESSION['search_owner']=$owner;
				$_SESSION['search_information']=$information;
				
				$db_host = "dbhome.cs.nctu.edu.tw";
				$db_name = "chymau_cs_a_firstdatabase";
				$db_user = "chymau_cs";
				$db_password = "12345678";
				$dsn = "mysql:host=$db_host;dbname=$db_name";
				$db = new PDO($dsn, $db_user, $db_password);
				
				if(empty($_POST["id"]))
				{
					echo "1";
					$stmt = "CREATE table t_id as
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id ORDER BY id ASC";
					$_SESSION['search_id']='keywords';
					$db->exec($stmt);
				}
				else if($id != "")
				{
					echo "2";
					$stmt = $db->prepare("create table t_id as 
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id and house.id = :id ORDER BY id ASC");
					$stmt->execute(array(':id'=>$id));
				}
				
				if(empty($_POST["name"]))
				{
					echo "3";
					$stmt2 = "CREATE table t_name as
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id ORDER BY id ASC";
					$_SESSION['search_name']='keywords';
					//"drop table t_id";
					$db->exec($stmt2);
				}
				else if($name != "")
				{
					echo "4";
					$stmt2 = $db->prepare("create table t_name as 
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id and house.name = :name ORDER BY id ASC");
					//"drop table t_id";
					$stmt2->execute(array(':name'=>$name));
				}
				
				if(empty($_POST["location"]))
				{
					echo "5";
					$stmt3 = "CREATE table t_location as
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id ORDER BY id ASC";
					$_SESSION['search_location']='keywords';
					//"drop table t_name";
					$db->exec($stmt3);
				}
				else if($location != "")
				{
					echo "6";
					$stmt3 = $db->prepare("create table t_location as 
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id and house.location = :location ORDER BY id ASC");
					//"drop table t_name";
					$stmt3->execute(array(':location'=>$location));
				}
				
				if(empty($_POST["time"]))
				{
					echo "7";
					$stmt4 = "CREATE table t_time as
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id ORDER BY id ASC";
					$_SESSION['search_time']='keywords';
					//"drop table t_location";
					$db->exec($stmt4);
				}
				else if($time != "")
				{
					echo "8";
					$stmt4 = $db->prepare("create table t_time as 
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id and house.time = :time ORDER BY id ASC");
					//"drop table t_location";
					$stmt4->execute(array(':time'=>$time));
				}
				
				if(empty($_POST["owner"]))
				{
					echo "9";
					$stmt5 = "CREATE table t_owner as
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id ORDER BY id ASC";
					$_SESSION['search_owner']='keywords';
					//"drop table t_time";
					$db->exec($stmt5);
				}
				else if($owner != "")
				{
					echo "10";
					$stmt5 = $db->prepare("create table t_owner as 
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id and house.owner = :owner ORDER BY id ASC");
					//"drop table t_time";
					$stmt5->execute(array(':owner'=>$owner));
				}
				
				if ($_POST['interval']=="1" || $_POST['interval']=="2" || $_POST['interval']=="3" || $_POST['interval']=="4" || $_POST['interval']=="5") 
				{
					echo "11";
					if($_POST['interval']=="1")
					{
						echo "13";
						$stmt8 = "CREATE table t_interval as
						SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
						FROM house JOIN people where house.owner_id = people.id and house.price between 0 and 3000";
						$db->exec($stmt8);
					}
					else if($_POST['interval']=="2")
					{
						echo "14";
						$stmt8 = "CREATE table t_interval as
						SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
						FROM house JOIN people where house.owner_id = people.id and house.price between 3000 and 6000";
						$db->exec($stmt8);
					}
					else if($_POST['interval']=="3")
					{
						echo "15";
						$stmt8 = "CREATE table t_interval as
						SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
						FROM house JOIN people where house.owner_id = people.id and house.price between 6000 and 12000";
						$db->exec($stmt8);
					}
					else if($_POST['interval']=="4")
					{
						echo "16";
						$stmt8 = "CREATE table t_interval as
						SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
						FROM house JOIN people where house.owner_id = people.id and house.price between 12000 and 20000";
						$db->exec($stmt8);
					}
					else if($_POST['interval']=="5")
					{
						echo "17";
						$stmt8 = "CREATE table t_interval as
						SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
						FROM house JOIN people where house.owner_id = people.id and house.price >= 20000";
						$db->exec($stmt8);
					}
				}
				else if(empty($_POST['interval'])) 
				{
					echo "12";
					$stmt8 = "CREATE table t_interval as
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id ORDER BY id ASC";
					$db->exec($stmt8);
				}
				
				if(empty($_POST['check_list']))
				{
					$info1 = "CREATE table t_info1 as
					SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner 
					FROM house JOIN people where house.owner_id = people.id ORDER BY id ASC";
					$db->exec($info1);
				}
				
				
				$stmt7 = "DROP table t_XXX ";
				$db->exec($stmt7);
				
				$stmt6 = "CREATE table t_XXX as
				SELECT t_id.id, t_id.name, t_id.price, t_id.time, t_id.location, t_id.owner FROM t_id 
				join t_location on t_id.id = t_location.id 
				join t_name on t_id.id = t_name.id 
				join t_time on t_id.id = t_time.id 
				join t_owner on t_id.id = t_owner.id
				join t_interval on t_id.id = t_interval.id;";
				$db->exec($stmt6);
				
				$house_sql = "SELECT * FROM t_XXX";
				$_SESSION['house'] = $house_sql;
				
				$house_sql2 = "SELECT * FROM t_XXX ORDER BY price ASC";
				$_SESSION['house_asc_p'] = $house_sql2;
				
				$house_sql3 = "SELECT * FROM t_XXX ORDER BY price DESC";
				$_SESSION['house_desc_p'] = $house_sql3;
					
				$house_sql4 = "SELECT * FROM t_XXX ORDER BY time ASC";
				$_SESSION['house_asc_t'] = $house_sql4;
					
				$house_sql5 = "SELECT * FROM t_XXX ORDER BY time DESC";
				$_SESSION['house_desc_t'] = $house_sql5;
				//"drop table t_owner";
				//create table t_id as SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner FROM house JOIN people where house.owner_id = people.id and house.id = '1' ORDER BY id ASC;
				$s = "drop table t_id, t_location, t_name, t_time, t_owner, t_interval, t_info1";
				$db->exec($s);
				echo "<script> location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/homepage.php'; </script>";
            ?>
        </tbody>
      </table>
  </body>
</html>