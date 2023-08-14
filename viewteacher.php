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
			<br><center>
			<table border="3">
				<tr>
					<td><u>NO</u></td>
					<td><u>TEACHER NAMES</u></td>
					<td><u>PHONE</u></td>
					<td><u>SALARY</u></td>
					<td><u>QUALIFICATION</u></td>
					<td colspan="2"><u>ACTION</u></td>
				</tr>
				<?php
				include "connect.php";
                           $query=mysqli_query($con,"select*from teachers");
                            $i=1;
                            while($row=mysqli_fetch_array($query)){
				?>

				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['t_names']  ?></td>
					<td><?php echo $row['phone'];  ?></td>
					<td><?php  echo $row['saraly'] ?></td>
					<td><?php   echo $row['qualification']?></td>
					<td>
						<form action="updateteacher.php" method="POST">
							<button type="submit" name="update" value="<?php echo $row['teacher_id']; ?>">update</button>
						</form></td>
						<td>
						<form action="deleteteacher.php" method="POST"> 
							<button type="submit" name="delete" value="<?php echo $row['teacher_id']; ?>">delete</button>
						</form></td>
						<?php
                        $i++;
                    }


						?>
					</tr>
			</table></center>
		</div>
		<div id="footer"></div>
	</div>

</body>
</html>

<?php
}
?>
