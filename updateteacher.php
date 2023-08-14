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
			include 'connect.php';
			$query=mysqli_query($con,"select * from teachers where teacher_id='$_POST[update]'");
			while ($row=mysqli_fetch_array($query)) {
				?>
				<br>
				<br>
				<form action="updateteacher.php" method="POST">
					<center><table>
			<tr>
				<input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">
				<td>Names</td><td><input type="text" value="<?php echo $row['t_names']; ?>" name="tn"></td>
			</tr>
			<tr><td>Phone</td><td><input type="number" value="<?php echo $row['phone']; ?>" name="phn"></td></tr>
			<tr><td>salary</td><td><input type="text" value="<?php echo $row['saraly']; ?>" name="slry"></td></tr>
			<tr><td>Qualification</td><td><input type="text" value="<?php echo $row['qualification']; ?>" name="qlf"></td>
			</tr>
			<tr><td></td><td><input type="submit" value="update" name="upbtn"></td></tr>			



					</table>
					
				</form>

				<?php
			}
			?>
			<?php
			if (isset($_POST['upbtn'])) {
             include "connect.php";
             $query=mysqli_query($con,"update teachers set t_names='$_POST[tn]',phone='$_POST[phn]',saraly='$_POST[slry]',qualification='$_POST[qlf]' where teacher_id='$_POST[id]' ");
             header("location:viewteacher.php");
             }

			?>


`
		</div>
		<div id="footer"></div>
	</div>

</body>
</html>

<?php
}
?>
