<?php
   session_start();
   unset($_SESSION['id']);
   unset($_SESSION['account']);
   unset($_SESSION['name']);
   unset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>logout</title>
  </head>
  <body>
      <table>
        <tbody>
		  <?php
		    if($_SESSION['account'] == null)
			{
				 echo "<script> location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/index.php'; </script>";
				 exit;
		    }
		  ?>
        </tbody>
      </table>
  </body>
</html>