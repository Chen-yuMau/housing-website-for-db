<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="stylesheet" href="index.css">
    	<title>Homepage</title>
    </head>
    <body>
      	<?php
   			if($_SESSION['account'] == null)
   			{
   				echo "<script> alert('You didnt log in yet!!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/index.html'; </script>";
   				exit;
   			}
		?>
		<form method="post" action = "housemanagement.php" id="housemanagement"></form>
		<form method="post" action = "user.php" id="favorite"></form>
		<form method="post" action = "admin.php" id="membermanagement"></form>
		<form method="post" action = "logout.php" id="logout"></form>
		<form method="post" action = "add_favorite.php" id="add_favorite"></form>
		<form method="post" action = "house_delete.php" id="house_delete"></form>
		<form method="post" action = "asc.php" id="ASC"></form>
		<form method="post" action = "desc.php" id="DESC"></form>
		<h1>Home Page</h1>
		<button  style="width:200px" class="submit" type="submit" class="submit" form="housemanagement">Housemanagement</button>
		<button  style="width:200px" class="submit" type="submit" class="submit" form="favorite">Myfavorite</button>
		<?php
			if($_SESSION['ident'] == 'admin')
			{
		?>
				<button  style="width:200px" class="submit" type="submit" class="submit" form="membermanagement">Membermanagement</button>
		<?php		
			}
		?>
		<button  style="width:200px" class="submit" type="submit" class="submit" form="logout">Logout</button>
		<br> <br> <br> <br>
    	<table width="100%">
			<thead>
				<form action="search.php" method="post">
					<tr>
						<td></td>
						<td></td>
						<td>
							<table>
								<tr><td><input type="radio" name="interval" value="5"></td><td>20000~</td></tr>
	  							<tr><td><input type="radio" name="interval" value="4"></td><td>12000~20000</td></tr>
	  							<tr><td><input type="radio" name="interval" value="3"></td><td>6000~12000</td></tr>
	  							<tr><td><input type="radio" name="interval" value="2"></td><td>3000~6000</td></tr>
	  							<tr><td><input type="radio" name="interval" value="1"></td><td>0~3000</td></tr>
	  						</table>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td>
						<table>
							<tr><td><input type="checkbox" name="check_list[]" value="laundry facilities" id="laundry facilities"></td><td>laundry facilities</td>
							<td><input type="checkbox" name="check_list[]" value="wifi" id="wifi"></td><td>wifi</td></tr>
							<tr><td><input type="checkbox" name="check_list[]" value="lockers" id="lockers"></td><td>lockers</td>
							<td><input type="checkbox" name="check_list[]" value="kitchen" id="kitchen"></td><td>kitchen</td></tr>
							<tr><td><input type="checkbox" name="check_list[]" value="elevator" id="elevator"></td><td>elevator</td>
							<td><input type="checkbox" name="check_list[]" value="no smoking" id="no smoking"></td><td>no smoking</td></tr>
							<tr><td><input type="checkbox" name="check_list[]" value="television" id="television"></td><td>television</td>
							<td><input type="checkbox" name="check_list[]" value="breakfast" id="breakfast"></td><td>breakfast</td></tr>
							<tr><td><input type="checkbox" name="check_list[]" value="toiletries provided" id="toiletries provided"></td><td>toiletries provided</td>
							<td><input type="checkbox" name="check_list[]" value="shuttle service" id="shuttle service"></td><td>shuttle service</td></tr>
						</table>	
						</td>
						<td></td>
				</tr>
				<tr>
						<td> <input name="id" placeholder=<?php echo $_SESSION['search_id']?> type="text" /> </td>
						<td> <input name="name" placeholder=<?php echo $_SESSION['search_name']?> type="text" /> </td>
						<td> <input name="price" placeholder=<?php echo "interval"?> type="text" /> </td>
						<td> <input name="location" placeholder=<?php echo $_SESSION['search_location']?> type="text" /> </td>
						<td> <input name="time" placeholder=<?php echo $_SESSION['search_time']?> type="text" /> </td>
						<td> <input name="owner" placeholder=<?php echo $_SESSION['search_owner']?> type="text" /> </td>
						<td> </td>
						<td> <button name="search" type="submit" value="1" class="submit">search</button> </td>
					</form>
				</tr>
	        </thead>
			
	          	<tr>
	          		<td>id</td>
		            <td>name</td>
					<td align="center">
						<button style="width:100px;height:20px;font-size:1px;" form="ASC" class="submit" type="submit" value="<?php echo "1"; ?>" name="ASC">▲</button>
						<br>price<br>
						<button style="width:100px;height:20px;font-size:1px;" form="DESC" class="submit" type="submit" value="<?php echo "1"; ?>" name="DESC">▼</button>
					</td>
					<td>location</td>
					<td align="center">
						<button style="width:100px;height:20px;font-size:1px;" form="ASC" class="submit" type="submit" value="<?php echo "2"; ?>" name="ASC">▲</button>
						<br>time<br>
						<button style="width:100px;height:20px;font-size:1px;" form="DESC" class="submit" type="submit" value="<?php echo "2"; ?>" name="DESC">▼</button>
					</td>
					<td>owner</td>
					<td>information</td>
					<td>option</td>
					<td></td>
					<td></td>
	          	</tr>
	        
	        <tbody>
	            <?php
					$useridnow = $_SESSION['id'];
		            $db_host = "dbhome.cs.nctu.edu.tw";
		            $db_name = "chymau_cs_a_firstdatabase";
		            $db_user = "chymau_cs";
		            $db_password = "12345678";
		            $dsn = "mysql:host=$db_host;dbname=$db_name";
		            $db = new PDO($dsn, $db_user, $db_password);
		            $house_sql = $_SESSION['house'];
		            $house_rs = $db->query($house_sql);
					$favorite_sql = "SELECT id FROM favorite where user_id = '$useridnow'";
		            $favorite_rs = $db->query($favorite_sql);
				?>	
				
				<?php
		            while($house = $house_rs->fetchObject())
		            {
		        		$tag = $house->id;
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
							<?php
								$favorite_sql = "SELECT id FROM favorite where user_id = '$useridnow' and favorite_id = '$h_id'";
								$favorite_rs = $db->query($favorite_sql);
								$fff = 0;
								while($fffff = $favorite_rs->fetchObject())
								{
									if($fffff != null)
									{
										$fff = 1;
									}
								}
								//echo $fff;
								if($fff==0)
								{
							?>
					            	<button style="width:200px" form="add_favorite" class="submit" type="submit" value="<?php echo $tag; ?>" name="add_favorite">Favorite</button>
							<?php
								}
								else if($fff==1)
								{
									echo "favorited";
								}
								if($_SESSION['ident'] == 'admin')
								{
							?>
									<td> <button style="width:200px" form="house_delete" class="submit" type="submit" value="<?php echo $tag; ?>" name="house_delete">Delete</button> </td>
							<?php
								}
							?>
					        </td>
			            </tr>
	            <?php
	              	}
	            ?>
	        </tbody>
        </table>
    </body>
</html>