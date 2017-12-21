<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Favorite Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link type="text/css" rel="stylesheet" href="index.css">
</head>
<body>
	<form method="post" action = "homepage.php" id="homepage"></form>
	<form method="post" action = "logout.php" id="logout"></form>
	<form method="post" action = "delete_favorite.php" id="delete_favorite"></form>
    <h1><strong>Favorite page</strong></h1>
			<?php
	            if($_SESSION['account'] == null)
                {
				  echo "<script> alert('You didnt log in yet!!'); location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/index.html'; </script>";
			    }
			?>
			<p>
				<button  style="width:200px" class="submit" type="submit" class="submit" form="homepage">Homepage</button>
				<button  style="width:200px" class="submit" type="submit" class="submit" form="logout">Logout</button>
			</p>
	    </br>
		<table align="center">
			<tbody>
				<tr>
		          	<td>Name：<?php echo $_SESSION['name']; ?></td>
		        </tr>
		        <tr>
		          	<td>Account：<?php echo $_SESSION['account']; ?></td>
		        </tr>
		        <tr>
		          	<td>E-mail：<?php echo $_SESSION['email']; ?></td>
		        </tr>
			</tbody>
	    </table>
	</div>
	
	<br> <br>
		
    	<table width="100%">
	        <thead>
	          	<tr>
	          		<td>id</td>
		            <td>name</td>
					<td>price</td>
					<td>location</td>
					<td>time</td>
					<td>owner</td>
					<td>information</td>
					<td>option</td>
					<td></td>
					<td></td>
	          	</tr>
	        </thead>
	        <tbody>
	            <?php
		            $db_host = "dbhome.cs.nctu.edu.tw";
		            $db_name = "chymau_cs_a_firstdatabase";
		            $db_user = "chymau_cs";
		            $db_password = "12345678";
		            $dsn = "mysql:host=$db_host;dbname=$db_name";
		            $db = new PDO($dsn, $db_user, $db_password);
		            $house_sql = "SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner, favorite.id as fav, favorite.user_id as fav_user
									FROM house JOIN people, favorite
									where house.owner_id = people.id and house.id = favorite.favorite_id";
		            $house_rs = $db->query($house_sql);
					$favorite_sql = "SELECT * FROM favorite";
		            $favorite_rs = $db->query($favorite_sql);
				?>	
				
				<?php
				$numofhouses = 0;
		            while($house = $house_rs->fetchObject())
		            {
						{
						if($house->fav_user == $_SESSION['id'])
						{	
							$numofhouses = $numofhouses + 1;
							$tag = $house->fav;
							$h_id = $house->id;
						
		        ?>
			            <tr>
			            	<td><?php echo $house->id;  ?></td>
				            <td><?php echo $house->name;  ?></td>
							<td><?php echo $house->price; ?></td>
							<td><?php echo $house->location; ?></td>
							<td><?php echo $house->time; ?></td>
							<td><?php echo $house->owner; ?></td>
							<td><?php
								$info_sql = "SELECT information.information FROM information where '$house->id' = information.house_id";
				            	$info_rs = $db->query($info_sql);
				            	$info = $info_rs->fetchObject();
				            	if($info)
				            	{
				            		echo $info->information;
					            	while($info = $info_rs->fetchObject())
					            	{
									echo " - ";
									echo $info->information;
									}
				            	}
							?>
							</td>
							<td>
					            	<button style="width:200px" form="delete_favorite" class="submit" type="submit" value="<?php echo $tag; ?>" name="delete_favorite">Remove</button>
					        </td>
			            </tr>
	            <?php
						}
						}
	              	}
				?>
					<?php
						if ( $numofhouses == 0)
						{
					?>
							<tr>
							<td></td>
							<td></td>
							<td></td>
							<td><p>You Don't Have Favorites!</p></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							</tr>
					<?php
						}
					?>
	        </tbody>
        </table>
</body>
</html>