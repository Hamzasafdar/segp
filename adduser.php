<?php
$conn = mysqli_connect('localhost','root','','segp');
session_start();


if (!(isset($_SESSION['admin']))) {
  header("location:login.php");
}

?>
<?php
if (isset($_SESSION['admin'])) {
	?>
	
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="adduser_process.php" enctype="multipart/form-data">
		Name <br>
		<input type="text" name="name"> <br>
		Father Name <br>
		<input type="text" name="f_name"><br>
		UOB<br>
		<input type="text" name="uob"><br>
		CNIC<br>
		<input type="text" name="cnic"><br>
		<input type="file"  name="image" value="Choose">
		<input type="submit" value="submit">
		<button><a href="signout.php">logout<a></button>
	</form>
</body>
</html>
<?php
}
?>