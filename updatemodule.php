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
			<?php 
			include "connect.php";
                    $query=mysqli_query($con,"SELECT*FROM modules where module_code='$_POST[update]'");
                    while ($row=mysqli_fetch_array($query)) {
                    	
                    ?>

                  
<form action="updatemodule.php" method="POST">
		
	<br>
	

	<h2><u><center>Update modules</u></h2>
	<center><table>
		<tr>
			
			<td>module_code</td><td><input type="text" name="name" value="<?php echo $row['module_code'];  ?>"></td>
		</tr>
		<tr>
		<td>module_title</td><td><input type="text" name="mt" value="<?php echo $row['module_tittle'];  ?>"></td>
		</tr>
		<tr>
			<td>credits</td><td><input type="text" name="c" value="<?php echo $row['credits'] ?>"></td>
		</tr>
		<tr><td></td><td><input type="submit" value="UPDATE" name="updatebtn"></td></tr>

	</table>
</form>
<?php
}
?>
<?php
if (isset($_POST['updatebtn'])) {
	
include "connect.php";
$n=mysqli_query($con,"update modules set module_code='$_POST[name]',module_tittle='$_POST[mt]',credits='$_POST[c]' where module_code='$_POST[name]'");
if ($n) {
	header("location:viewmodule.php");
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
