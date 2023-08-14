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
			<center>
      <form method="POST">
      	<table>
      		<tr><th>username</th><th><input type="text" name="n"></th></tr>
      		<tr><th>password</th><th><input type="password" name="p"></th></tr>
      		<tr><th></th><th><input type="submit" value="confirm" name="btn"></th></tr>
      	</table>
      </form>
<?php
$id=$_SESSION['id'];
if (isset($_POST['btn'])) {
	include "connect.php";
	$query=mysqli_query($con,"select*from login where names='$_POST[n]' and password='$_POST[p]'");
	while ($row=mysqli_fetch_array($query)) {
		


?>
 <form method="POST">
      	<table>
      		<tr><th><input type="hidden" value="<?php echo $id ?>" name="id">
      		username</th><th><input type="text" value="<?php echo $row['names']?>" name="nu"></th></tr>
      		<tr><th>password</th><th><input type="password" value="<?php echo $row['password']?>" name="np"></th></tr>
      		<tr><th></th><th><input type="submit" value="check" name="rbtn"></th></tr>
      	</table>
      </form>
<?php
}}
?>
<?php
if (isset($_POST['rbtn'])) {
	include "connect.php";
	$query=mysqli_query($con,"update login set names='$_POST[nu]' and password='$_POST[np]' where id='$id' ");
if ($query) {
	echo "account reseted";
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
