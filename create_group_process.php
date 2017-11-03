<?php
$conn = mysqli_connect('localhost','root','','segp');
session_start();

if (!(isset($_SESSION['admin']))) {
  header("location:login.php");
}

$gpname = $_POST['groupname'];
$gyear = $_POST['year'];

$query = "INSERT INTO groups VALUES('','$gpname','$gyear')";

$r = mysqli_query($conn,$query);
if ($r) {
	header('location:creategroup.php');
}

?>