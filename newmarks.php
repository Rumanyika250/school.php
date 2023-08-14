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
			<br>
			<br>

			<form method="POST">
				<center>
				<table>
					<h2><u>New Marks</u></h2>
					<tr><td>FA</td><td><input type="number" max="100" name="f"></td></tr>	

					<tr><td>SA</td><td><input type="number" max="100" name="s"></td></tr>
					<tr><td>Teacher</td><td><select name="teacher">
						<option>select teacher</option>
						<?php
                         include 'connect.php';
                         $query=mysqli_query($con,"SELECT * FROM teachers");
                         while ($row=mysqli_fetch_array($query)) {
                         	?>
                  <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['t_names']; ?></option>       	
                         	<?php
                         }
						?>
					</select></td></tr>
					<tr><td>Student</td><td><select name="student">
						<option>select student</option>
						<?php
                         include 'connect.php';
                         $query=mysqli_query($con,"SELECT * FROM student");
                         while ($row=mysqli_fetch_array($query)) {
                         	?>
                  <option value="<?php echo $row['student_id']; ?>"><?php echo $row['s_names']; ?></option>       	
                         	<?php
                         }
						?>
					</select></td></tr>
					<tr><td>Module</td><td><select name="module">
						<option>select module</option>
						<?php
                         include 'connect.php';
                         $query=mysqli_query($con,"SELECT * FROM modules");
                         while ($row=mysqli_fetch_array($query)) {
                         	?>
                  <option value="<?php echo $row['module_code']; ?>"><?php echo $row['module_tittle']; ?></option>       	
                         	<?php
                         }
						?>
					</select></td></tr>
					<tr><td></td><td><input type="submit" value="save" name="btn"></td></tr>
				
			
				</table>
			</form>
			<?php
			include "connect.php";
			if (isset($_POST['btn'])) {
				$query=mysqli_query($con,"INSERT INTO marks VALUES('','$_POST[f]','$_POST[s]','$_POST[teacher]','$_POST[student]','$_POST[module]')");
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
