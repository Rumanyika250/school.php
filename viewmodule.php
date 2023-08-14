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
			<table border="3">
				<tr>
					<td>MODULE_CODE</td>
					<td>MODULE_TITLE</td>
					<td>CREDIT</td>
					<td colspan="2">ACTION</td>
				</tr>
				<?php
                 include "connect.php";
                 $query=mysqli_query($con,"select*from modules");
                 while ($row=mysqli_fetch_array($query)) {
             ?>

              <tr>
              	<td><?php echo $row['module_code'] ?></td>
              	<td><?php echo $row['module_tittle'] ?></td>
              	<td><?php echo $row['credits']  ?></td>
              	<td>
              		<form action="updatemodule.php" method="POST">
              			<button type="submit"  name="update" value="<?php echo $row['module_code'] ?>">update</button>
              		</form></td>
              		<td><form action="deletemodule.php" method="POST">
              			<button type="submit"  name="delete" value="<?php echo $row['module_code'] ?>">delete</button>
              		</form></td></tr>
              		<?php
              		
                     }
              		?>
			</table></center>

		</div>
		<div id="footer"></div>
	</div>

</body>
</html>

<?php
}
?>
