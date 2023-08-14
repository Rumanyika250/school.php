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
                    $query=mysqli_query($con,"SELECT*FROM student where student_id='$_POST[update]'");
                    while ($row=mysqli_fetch_array($query)) {
                    	
                    ?>

                  
<form action="updatestudent.php" method="POST">
		
	<br>
	

	<h2><u><center>Update Student</u></h2>
	<center><table>
		<tr>
			<input type="hidden" name="id" value="<?php echo $row['student_id'] ?>">
			<td>Names</td><td><input type="text" name="name" value="<?php echo $row['s_names'];  ?>"></td>
		</tr>
		<tr>
			<td>Sex</td><td><select name="sex" >
				<option>
					
				</option>
			<option value="Male">Male</option>
			<
				
			<option value="Female">Female</option>	
             

			</select></td>
		</tr>
		<tr>
			<td>Date Of Birth</td><td><input type="date" name="date" value="<?php echo $row['DOB'] ?>"></td>
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
$n=mysqli_query($con,"update student set s_Names='$_POST[name]',sex='$_POST[sex]',DOB='$_POST[date]' where Student_id='$_POST[id]'");
if ($n) {
	header("location:viewstudent.php");
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
