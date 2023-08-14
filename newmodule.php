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
		<div id="content"><center>
			<br>
			<br>
			<h2><u>new module</u></h2>
	    <form method="POST">
	    	<table> 
	    		<tr><td>module_code</td><td><input type="text" name="mn"></td></tr>
	    		<tr><td>module_title</td><td><input type="text" name="mt"></td></tr>
	    		<tr><td>credits</td><td><input type="text" name="c"></td></tr>
	    		<tr><td></td><td><input type="submit" value="save" name="btn"></td></tr>
	    	</table>
	    </form>		
      
<?php
if (isset($_POST['btn'])) {
	include "connect.php";
	$query=mysqli_query($con,"INSERT INTO modules values('$_POST[mn]','$_POST[mt]','$_POST[c]')");
	if ($query) {
		echo "done";
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
