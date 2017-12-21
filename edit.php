<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="stylesheet" href="index.css">
    	<title>house management</title>
    </head>
    <body>
      	<?php
   			if($_SESSION['account'] == null)
   			{
   				echo "<script> alert('You didnt log in yet!!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/index.html'; </script>";
   				exit;
   			}
		?>
		<form method="post" action = "editor.php" id="delete"></form>
		<h1>My Houses</h1>
		<form style = "width: 15%;" action = "newhouse.html" id="new"><!-- -->
		</form>
		<form style = "width: 15%;" action = "housemanagement.php" id="edit">
    	</form>
		<form style = "width: 15%;" action = "logout.php" id="logout">
		</form>
		<form style = "width: 15%;" action = "homepage.php" id="main"><!-- -->
    	</form>
    	<table width="100%">
	          	<tr>
	          		<td>
						<button  style="width:200px" class="submit" type="submit" class="submit" form="new">New</button>
					</td>
		            <td>
						<button  style="width:200px" class="submit" type="submit" class="submit" form="edit">Back</button>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
			        <td>
						<button  style="width:200px" class="submit" type="submit" class="submit" form="main">Home Page</button>
				    </td>
					<td>
						<button  style="width:200px" class="submit" type="submit" class="submit" form="logout">Logout</button>
			        </td>
	          	</tr>
	    </table>
	            <?php
	            	$db_host = "dbhome.cs.nctu.edu.tw";
		            $db_name = "chymau_cs_a_firstdatabase";
		            $db_user = "chymau_cs";
		            $db_password = "12345678";
		            $dsn = "mysql:host=$db_host;dbname=$db_name";
		            $db = new PDO($dsn, $db_user, $db_password);
		            $house_sql = "SELECT house.id, house.name, house.price, house.location, house.time, people.name as owner FROM house JOIN people where house.owner_id = people.id";
		            $house_rs = $db->query($house_sql);
			?>
		<table width="100%">
			<thead>		
				<tr>
					<td>ID</td>
		            <td>Name</td>
		            <td>Price</td>
					<td>Location</td>
					<td>Time</td>
					<td>Owner</td>
					<td>Information</td>
					<td>Option</td>
		        </tr>
		    </thead>
		    <tbody>
	        <?php
	        $numofhouses = 0;
		            while($house = $house_rs->fetchObject())
		            {
		            		if($house->owner == $_SESSION["name"])
		            		{
		            		$numofhouses = $numofhouses + 1;
		            		$tag = $house->id;
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
							?></td>
							<td>
					            	<button style="width:200px" form="delete" class="submit" type="submit" value="<?php echo $tag; ?>" name="Edit">Edit</button>
					        </td>
			            </tr>
	            <?php
	                         }
	              	}
        if ( $numofhouses == 0)
        {
        ?>
        		<tr>
					<td></td>
		            <td></td>
		            <td></td>
					<td><p>You Have No Houses!</p></td>
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