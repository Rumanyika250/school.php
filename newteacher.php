<?php
session_start();
if (!isset($_SESSION['password'])) {
	header("location:login.php");
}
else
{
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
		<div id="menu"> 
  
         <?php include "menu.php" ?>       

		</div>
		<div id="content">
			<br>
			<br>
			 <form method="POST">
			 	<center><table>
			 		<h2><u>record teacher</u></h2>
			 		<tr><td>teacher names:</td><td><input type="text" name="tn"></td></tr>
			 		<tr><td>phone</td><td><input type="number" name="p"></td></tr>
			 		<tr><td>salary</td><td><input type="text" name="s"></td></tr>
			 		<tr><td>qualification</td><td><input type="text" name="q"></td></tr>
			 		<tr><td></td><td><input type="submit" value="save" name="btn"></td></tr>
			 	</table>
			 </form>
<?php
if (isset($_POST['btn'])) {
	include "connect.php";
	$query=mysqli_query($con,"INSERT INTO teachers VALUES('','$_POST[tn]','$_POST[p]','$_POST[s]','$_POST[q]')");
	if ($query) {
		echo "saved";
	}
}


?>
 



		</div>
		<div id="footer"></div>
	</div>

</body>
</html>

<?php
}
?>
