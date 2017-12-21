<!DOCTYPE html>
<html>
	
	<head>
		<link rel="stylesheet" href="index.css">
		<title>New House</title>
	</head>
	
	<body>
	<br/><br/><br/>
	<h1><strong>Please Fill In The Following To Register</strong></h1>
		<form action="housemanagement.php" method="post" id="cancel"></form>
 		<form action="newhouse.php" method="post" id="new">
			
 		<?php
 			$hid=$_POST['Edit'];
 			$db_host = "dbhome.cs.nctu.edu.tw";
		    $db_name = "chymau_cs_a_firstdatabase";
		    $db_user = "chymau_cs";
		    $db_password = "12345678";
		    $dsn = "mysql:host=$db_host;dbname=$db_name";
		    $db = new PDO($dsn, $db_user, $db_password);
		    $house_sql = "SELECT house.id, house.name, house.price, house.location FROM house where house.id = '$hid'";
		    $house_rs = $db->query($house_sql);
		    $house = $house_rs->fetchObject();



		    echo 
			
			'<br/><br/>
			<input name=name value="'. $house->name. '"type="text" required />
			<br/>
			<input name=price value="'. $house->price. '"type="number" required />
			<br/>
			<input name=location value="'. $house->location. '"type="text" required />
			<br/>';
		?>            
			<p>Information</p>
			<table align="center">
				<tbody>
					<tr>
						
						<td><label class="container">laundry facilities<input type="checkbox" name="check_list[]" value="laundry facilities" id="laundry facilities"><span class="checkmark"></span></label></td>
						<td><label class="container">wifi<input type="checkbox" name="check_list[]" value="wifi" id="wifi"><span class="checkmark" ></span></label></td>
						<td><label class="container">lockers<input type="checkbox" name="check_list[]" value="lockers" id="lockers"><span class="checkmark"></span></label></td>
						<td><label class="container">kitchen<input type="checkbox" name="check_list[]" value="kitchen" id="kitchen"><span class="checkmark"></span></label></td>
						<td><label class="container">elevator<input type="checkbox" name="check_list[]" value="elevator" id="elevator"><span class="checkmark"></span></label></td>
					</tr>
					<tr>
						<td><label class="container">no smoking<input type="checkbox" name="check_list[]" value="no smoking" id="no smoking"><span class="checkmark"></span></label></td>
						<td><label class="container">television<input type="checkbox" name="check_list[]" value="television" id="television"><span class="checkmark"></span></label></td>
						<td><label class="container">breakfast<input type="checkbox" name="check_list[]" value="breakfast" id="breakfast"><span class="checkmark"></span></label></td>
						<td><label class="container">toiletries provided<input type="checkbox" name="check_list[]" value="toiletries provided" id="toiletries provided"><span class="checkmark"></span></label></td>
						<td><label class="container">shuttle service<input type="checkbox" name="check_list[]" value="shuttle service" id="shuttle service"><span class="checkmark"></span></label></td>
					</tr>
		</form>
					<tr>
						<td></td>
						<td><button form="new" name="create" class="submit" type="submit" value=<?php echo $hid;?>>Overwrite House?</button></td>
						<td></td>
						<td><button form="cancel" name="cancel" class="submit" type="submit" value="0" >Cancel</button></td>
						<td></td>
					</tr>
					<?php

						$info_sql = "SELECT information.information FROM information where information.house_id = '$hid'";
		    			$info_rs = $db->query($info_sql);
		    			while($info = $info_rs->fetchObject())
		    			{
		    				?>
		    				<script>document.getElementById("<?php echo $info->information;?>").checked = true;</script>
		    				<?php
		    			}
						?>
				</tbody>
			</table>
	</body>
</html>
<!--laundry facilities	wifi	lockers	kitchen	elevator	no smoking	television	breakfast	toiletries provided	shuttle service-->