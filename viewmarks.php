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
			<table border="3">
				<tr>
					<td>NO</td>
					<td>STUDENTNAMES</td>
					<td>TEACHERNAMES</td>
					<td>MODULE_TITTLE</td>
					<td>FORMATIVE ASSESSMENT</td>
					<td>SURMATIVE ASSESSMENT</td>
				</tr>
               <?php
                         include "connect.php";
                $sql="SELECT marks.marks_id,student.s_names,teachers.t_names,modules.module_tittle,marks.FA,marks.SA from student inner join marks inner join teachers inner join modules ON marks.student_id=student.student_id and marks.teacher_id=teachers.teacher_id and marks.module_code=modules.module_code;";
                $query=mysqli_query($con,$sql);
                $i=1;
                while ($row=mysqli_fetch_array($query)) {
               ?>
         <tr> 
         	<td><?php echo $i; ?></td>
         	<td><?php echo $row['s_names']; ?></td>
         	<td><?php echo $row['t_names']; ?></td>
         	<td><?php echo $row['module_tittle'];?></td>
         	<td><?php echo $row['FA'];?></td>
         	<td><?php echo $row['SA'];?></td>
</tr>
<?php
$i++;
}
?>




			</table>
		</div>
		<div id="footer"></div>
	</div>

</body>
</html>

<?php
}
?>
