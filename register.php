<?php
   session_start();
   $_SESSION['new_account']='';
   $_SESSION['new_password1']='';
   $_SESSION['new_password2']='';
   $_SESSION['new_name']='';
   $_SESSION['new_email']='';
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
				$account =  $_POST["Account"];
				$password1 = $_POST["Password1"];
				$password2 = $_POST["Password2"];
				$name = $_POST["Name"];
				$atrr = $_POST["create"];
				$email = $_POST["E-mail"];
				$_SESSION['new_account']=$account;
				$_SESSION['new_password1']=$password1;
				$_SESSION['new_password2']=$password2;
				$_SESSION['new_name']=$name;
				$_SESSION['new_email']=$email;
				$hashn = hash( 'md5' , $password1 );
				$db_host = "dbhome.cs.nctu.edu.tw";
				$db_name = "chymau_cs_a_firstdatabase";
				$db_user = "chymau_cs";
				$db_password = "12345678";
				$dsn = "mysql:host=$db_host;dbname=$db_name";
				$db = new PDO($dsn, $db_user, $db_password);
				$people_sql = "SELECT * FROM people";
				$people_rs = $db->query($people_sql);
			    if(preg_match("[ ]",$account))
				{
					if($_SESSION['account'] == null)
					{
						echo "<script> alert('The account cannot have blanks!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/register.html'; </script>";
						exit;
					}
					else
					{
						echo "<script> alert('The account cannot have blanks!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/register5.html'; </script>";
						exit;
					}
				}
				while($person = $people_rs->fetchObject())
				{
					if($person->account == $account)
					{
						$_SESSION['new_account'] = 'Account';
						echo "<script> alert('This account has already been taken!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/register2.php'; </script>";
						exit;
					}
				}
				if($password1!=$password2)
				{
					$_SESSION['new_password1'] = 'Password1';
					$_SESSION['new_password2'] = 'Password2';
					echo "<script> alert('Two passwords are different!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/register3.php'; </script>";
					exit;
				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{
					$_SESSION['new_email'] = 'E-mail';
					echo "<script> alert('Wrong email format!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/register4.php'; </script>";
					exit;
				}				
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{
					$sqlinsert = "INSERT INTO  `chymau_cs_a_firstdatabase`.`people` (identity_id, name, account, password, email) VALUES ('$atrr', '$name', '$account', '$hashn', '$email')";
					$people_rs = $db->query($sqlinsert);
					unset($_SESSION['new_account']);
					unset($_SESSION['new_name']);
					unset($_SESSION['new_email']);
					unset($_SESSION['new_password1']);
					unset($_SESSION['new_password2']);
					if($_SESSION['account']==null)
					{
						echo "<script> alert('Successfully registered!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/index.html'; </script>";
						exit;
					}
					else
					{
						echo "<script> alert('Successfully registered!');location.href='http://people.cs.nctu.edu.tw/~chymau/webhw2/admin.php'; </script>";
						exit;
					}
					exit;
				}
            ?>
        </tbody>
      </table>
  </body>
</html>