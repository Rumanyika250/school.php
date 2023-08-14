<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="c.css">
</head>
<body>
	<div id="layout">
		<div id="banner"></div>
		<div id="menu"></div>
		<div id="content">
			<br>
			<br>
			<center><h2><u>LOGIN FORM</u></h2>
		<form method="POST">
	<table align="center">
		<tr><th>username :</th><th><input type="text" name="un"></th></tr>
		<tr><th>password :</th><th><input type="password" name="pd"></th></tr>
		<tr><th></th><th><input type="submit" value="login" name="logbtn"></th>
	</table>
</form>
<?php
if (isset($_POST['logbtn'])) {
	$names=$_POST['un'];
	$pass=$_POST['pd'];
	include "connect.php";
	$query=mysqli_query($con,"select*from login WHERE names='$names' AND password='$pass'");
	$check=mysqli_num_rows($query);
	if ($check==1) {
		while ($row=mysqli_fetch_array($query)) {
			$_SESSION['password']=$row['password'];
			$_SESSION['id']=$row['id'];
			header("location:home.php");
		}
	}
	else{

		 echo "incorrect";
	}
}



?>

		</div>
		<div id="footer"></div>
	</div>
</body>
</html>


