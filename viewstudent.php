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
			<center><table border="3">
				<tr>
					<th>NO</th>
					<th>NAMES</th>
					<th>SEX</th>
					<th>DOB</th>
					<th colspan="2">ACTION</th>
				</tr>
				<?php 
                include "connect.php";
                $query=mysqli_query($con,"SELECT*FROM student");
                $i=1;
                while ( $row=mysqli_fetch_array($query)) {
				?>
				<tr>
					<td><?php echo $i?></td>
					<td><?php echo $row['s_names']?></td>
					<td><?php echo $row['sex']?></td>
					<td><?php echo $row['DOB']?></td>
                    <td><form  action="updatestudent.php" method="POST">
                    	<button  type="submit" name="update" value=" <?php echo $row['student_id'];?>" >update</button>
                    </form></td>
                     <td><form  action="deletestudent.php" method="POST">
                    	<button  type="submit" name="delete" value=<?php echo $row['student_id'] ;?>>delete</button>
                    </form></td>
                </tr>

                      <?php
                      $i++;
                  }
                      ?>
 
			</table><center>
		</div>
		<div id="footer"></div>
	</div>

</body>
</html>

<?php
}
?>
