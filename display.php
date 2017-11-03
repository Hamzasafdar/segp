<?php
$conn = mysqli_connect('localhost','root','','segp');
session_start();

if (!(isset($_SESSION['admin']))) {
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Display Students</title>

<link href="design/css/bootstrap.min.css" rel="stylesheet">
<link href="design/css/datepicker3.css" rel="stylesheet">
<link href="design/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Namal</span>College</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<ul class="nav menu">
			<li ><a href="forms.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Add New Student</a></li>
			<li><a href="creategroup.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Create Group</a></li>
			<li><a href="group.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Assign Groups</a></li>
			<li><a href="Report.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Download Data As PDF</a></li>
			<li><a href="upload.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Upload File</a></li>
			<li class="active"><a href="display.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Students</a></li>
			<li><a href="displaystaff.php.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Staff</a></li>
			<li><a href="displaygroups.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Group</a></li>
		</ul>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Display</h1>
			</div>
		</div><!--/.row-->
				

		
			<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Display</div>
					<div class="panel-body">

						<div class="panel-heading">Select Year</div>
						<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

						<select class="form-control" style="width: 40%" onchange="this.form.submit()" name="cl">
										<option disabled selected>Select Year</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>

						</form>
					</div>

					<div class="panel-body">
						<div class="RackList">
							<?php 
								$cl=0;
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									$cl = $_POST['cl'];
								}

								
								$sql = "SELECT * FROM student_data WHERE year = '$cl'";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
    
									echo "<table class='table table-hover'>";
									echo "<thead><tr> <th>Name</th><th>Father Name</th><th>UOB</th><th>CNIC</th><th>Department</th><th>Year</th></tr></thead><tbody>";
    									while($row = $result->fetch_assoc()) {

        									echo "<tr>";
        									echo "<td>".$row["name"]."</td>
        									<td>".$row["f_name"]."</td>
        									<td>".$row["uob"]."</td>
        									<td>".$row["cnic"]."</td>
        									<td>".$row["department"]."</td>
        									<td>".$row["year"]."</td>";
        									?>

        									 <td><a href="edit_record.php?id=<?=$row['id']?>"> <input type="button" value="Edit" class="btn btn-default btn-md pull-right"></a>
        									 	<a href="delete_student.php?id=<?=$row['id']?>"> <input type="button" value="Delete" class="btn btn-default btn-md pull-right"></a>	

        									 </td>

        									 <?php
    									}

									echo "</tbody></table>";
								} else {
    								echo "0 results";
								}
								$conn->close();
							
 							?>
						</div>
					</div>






				</div>
			</div>
		</div>

			</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	
</body>

</html>
