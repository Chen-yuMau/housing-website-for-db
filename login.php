<?php
   session_start();
   $_SESSION['account']='';
   $_SESSION['name']='';
   $_SESSION['email']='';
   
   $_SESSION['search_id']='keywords';
   $_SESSION['search_name']='keywords';
   $_SESSION['search_price']="0";
   $_SESSION['search_location']='keywords';
   $_SESSION['search_time']='keywords';
   $_SESSION['search_owner']='keywords';
   $_SESSION['search_information']='keywords';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>login</title>
  </head>
  <body>
      <table>
        <tbody>
            <?php
              $account = $_POST["Account"];
              $password = $_POST["Password"];
              $hash = hash( 'md5' , $password );

              $saccount = $account;
              $shash = $hash;

              $db_host = "dbhome.cs.nctu.edu.tw";
              $db_name = "chymau_cs_a_firstdatabase";
              $db_user = "chymau_cs";
              $db_password = "12345678";
              $dsn = "mysql:host=$db_host;dbname=$db_name";
              $db = new PDO($dsn, $db_user, $db_password);
              $people_sql = "SELECT people.id, people.name, account, email, identity.name as ident, password FROM people JOIN identity where people.identity_id = identity.id";
              $people_rs = $db->query($people_sql);
			  
              while($person = $people_rs->fetchObject())
              {
            	if($person->account == $saccount && $person->password == $shash)
            	{
					$_SESSION['ident'] = $person->ident;
					$_SESSION['id'] = $person->id;
				    $_SESSION['account'] = $account;
			        $_SESSION['name'] = $person->name;
				    $_SESSION['email'] = $person->email;
					
					$house_sql = "SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner
					FROM house JOIN people
					where house.owner_id = people.id ORDER BY id ASC";
					$_SESSION['house'] = $house_sql;
					
					$house_sql2 = "SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner
					FROM house JOIN people
					where house.owner_id = people.id ORDER BY price ASC";
					$_SESSION['house_asc_p'] = $house_sql2;
					
					$house_sql3 = "SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner
					FROM house JOIN people
					where house.owner_id = people.id ORDER BY price DESC";
					$_SESSION['house_desc_p'] = $house_sql3;
					
					$house_sql4 = "SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner
					FROM house JOIN people
					where house.owner_id = people.id ORDER BY time ASC";
					$_SESSION['house_asc_t'] = $house_sql4;
					
					$house_sql5 = "SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner
					FROM house JOIN people
					where house.owner_id = people.id ORDER BY time DESC";
					$_SESSION['house_desc_t'] = $house_sql5;
					
	            	echo "<script> location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/homepage.php'; </script>";
            	}
              }
              echo "<script> alert('Wrong account or password!!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/index.html'; </script>";
        				exit;
            ?>
        </tbody>
      </table>
  </body>
</html>