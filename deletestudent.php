<?php
include "connect.php";
$query=mysqli_query($con,"DELETE FROM student where student_id='$_POST[delete]'");
if ($query) {
	echo "deleted";
	header("location:viewstudent.php");
}

?>