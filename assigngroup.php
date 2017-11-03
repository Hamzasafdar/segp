<?php
$conn = mysqli_connect('localhost','root','','segp');
session_start();
session_start();

if (!(isset($_SESSION['admin']))) {
  header("location:login.php");
}

$id=$_REQUEST['id'];
$group=$_POST['group'];
$year=$_SESSION['salayear'];

$query =mysqli_query($conn,"SELECT * from groups where group_name='$group' AND year='$year'");
								$r= mysqli_fetch_row($query);

								
$query_insert="UPDATE student_data  SET
				groupno='".$r[0]."'
				
				WHERE id='".$id."'
				
				";

$result = $conn->query($query_insert);


if ($result) {
	header('location:test.php');
}


?>