<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<link rel="stylesheet" href="index.css">
    	<title>admin</title>
    </head>
    <body>
      	<?php
   			if($_SESSION['account'] == null)
   			{
   				echo "<script> alert('You didnt log in yet!!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/index.html'; </script>";
   				exit;
   			}
		?>
		<form method="post" action = "delete.php" id="delete"></form>
		<form method="post" action = "promote.php" id="promote"></form>
		<h1>Administrator</h1>
		<form style = "width: 15%;" action = "logout.php" id="logout">
		</form>
		<form style = "width: 15%;" action = "register5.html" id="new">
    	</form>
    	<form style = "width: 15%;" action = "homepage.php" id="main"><!-- -->
    	</form>
    	<table width="100%">
	        <thead>
	          	<tr>
	          		<td>#</td>
		            <td>Name</td>
					<td>Account</td>
					<td>Email</td>
					<td>Identity</td>
					<td></td>
					<td><button  style="width:200px" class="submit" type="submit" class="submit" form="main">Home Page</button></td>
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
		            $people_sql = "SELECT people.id, people.name, account,  identity.name as ident,  email FROM people JOIN identity where people.identity_id = identity.id";
		            $people_rs = $db->query($people_sql);
			?>		
				<tr>
					<td><p style = "color: #3fb6b2">*</p></td>
			        <td><p style = "color: #3fb6b2"><?php echo $_SESSION['name'];  ?></p></td>
					<td><p style = "color: #3fb6b2"><?php echo $_SESSION['account']; ?></p></td>
					<td><p style = "color: #3fb6b2"><?php echo $_SESSION['email']; ?></p></td>
					<td><p style = "color: #3fb6b2"><?php echo "admin" ; ?></p></td>
					<td>
						<button  style="width:200px" class="submit" type="submit" class="submit" form="logout">Logout</button>
			        </td>
			        <td>
						<button  style="width:200px" class="submit" type="submit" class="submit" form="new">New User</button>
				    </td>
		        </tr>
	        <?php
		            while($person = $people_rs->fetchObject())
		            {
		        		if($person->account!=$_SESSION['account'])
		        		{
		        			$tag = $person->account;
		        ?>

			            <tr>
			            	<td><?php echo $person->id;  ?></td>
				            <td><?php echo $person->name;  ?></td>
							<td><?php echo $person->account; ?></td>
							<td><?php echo $person->email; ?></td>
							<td><?php echo $person->ident; ?></td>
							<td>
					            	<button style="width:200px" form="delete" class="submit" type="submit" value="<?php echo $tag; ?>" name="Delete">Delete</button>
					        </td>
					        <td>
					            	<button style="width:200px" form="promote" class="submit" type="submit" value="<?php echo $tag; ?>" name="Promote">Promote</button>
					        </td>
			            </tr>
	            <?php
		        		}
	              	}
	            ?>
	        </tbody>
        </table>
    </body>
</html>