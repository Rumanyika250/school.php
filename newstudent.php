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
		<center>	<h2><u>new student</u></h2>
       <form method="POST">
       	<table>
      <tr><th> 	names</th><th><input type="text" name="name"></th>
       		<tr><th>sex</th><th><select name="sex">
       			<option>select gender</option>
       			<option value="male">male</option>
       			<option value="female">female</option>
       		</select></th></tr>
       			<tr><th>date of birth</th><th><input type="date" name="date"></th></tr>
       			<tr><th></th><th><input type="submit"value="register" name="rbtn"></th></tr>

           </table>
      
       </form>

     <?php
           
          if (isset($_POST['rbtn'])) {
          	include "connect.php";
          	$query=mysqli_query($con,"INSERT into student VALUES('','$_POST[name]','$_POST[sex]','$_POST[date]')");
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
