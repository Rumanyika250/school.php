
<div class="dropdown">
	<button class="btn">Student</button>
	<div class="drop_content">
		<a href="newstudent.php">record student</a>
		<a href="viewstudent.php">view student</a>
	</div>
</div>
<div class="dropdown">
	<button class="btn">teachers</button>
	<div class="drop_content">
		<a href="newteacher.php">record teacher</a>
		<a href="viewteacher.php">view teacher</a>
	</div>
</div>
<div class="dropdown">
	<button class="btn">marks</button>
	<div class="drop_content">
		<a href="newmarks.php">record marks</a>
		<a href="viewmarks.php">view marks</a>
	</div>
</div>
<div class="dropdown">
	<button class="btn">modules</button>
	<div class="drop_content">
		<a href="newmodule.php">record modules</a>
		<a href="viewmodule.php">view modules</a>
	</div>
</div>
<div class="dropdown">
	<button class="btn">account</button>
	<div class="drop_content">
		<a href="reset.php">reset account</a>
	</div>
</div>
<form method="POST">
	<div class="dropdown">
		<button class="btn" name="logout">logout</button>
	</div>
</form>

<?php
if (isset($_POST['logout'])) {
	session_destroy();
	header("location:login.php");
}


?>