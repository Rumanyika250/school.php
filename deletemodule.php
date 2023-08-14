<?php
include "connect.php";
$query=mysqli_query($con,"DELETE FROM modules where module_code='$_POST[delete]'");
if($query){
	header("location:viewmodule.php");
}

?>