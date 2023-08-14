<?php
include "connect.php";
$query=mysqli_query($con,"DELETE FROM teachers where teacher_id='$_POST[delete]'");
if ($query) {
	echo "deleted";
	header("location:viewteacher.php");
}

?>