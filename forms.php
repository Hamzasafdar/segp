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
<title>Add Student</title>

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
						<!-- <?php if (!(isset($_SESSION['admin']))) { ?> -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<!-- <?php } ?> -->
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search" action="search.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search" name="search"><br>
				<input type="submit" value="Search"  class="btn btn-primary">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="forms.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Add New Student</a></li>
			<li><a href="creategroup.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Create Group</a></li>
			<li><a href="group.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Assign Groups</a></li>
			<li><a href="Report.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Download Data As PDF</a></li>
			<li><a href="upload.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Upload File</a></li>
			<li><a href="display.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Students</a></li>
			<li><a href="displaystaff.php.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Staff</a></li>
			<li><a href="displaygroups.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Group</a></li>
			
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Students</h1>
			</div>
		</div><!--/.row-->
				

		<form method="post" action="adduser_process.php"  enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
							<div class="panel-body">
								<div class="form-group has-success">
									<label>Name</label>
									<input type="text" class="form-control" style="width: 40%" placeholder="Name" name="name"><br>
									<label>Father Name</label>
									<input type="text" class="form-control" style="width: 40%" placeholder="Father Name" name="fname"><br>

									<label>UOB</label>
									<input type="text" class="form-control" style="width: 40%" placeholder="UOB" name="uob"><br>

									<label>CNIC</label>
									<input type="text" class="form-control" style="width: 40%" placeholder="CNIC" name="cnic"><br>

									<label>Department</label>
									<select class="form-control" name="department" style="width: 40%">
										<option>Computer Science</option>
										<option>Electrical Engenring</option>
									</select>

									<label>Year</label>
									<select class="form-control" name="year" style="width: 40%">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>

									<label>Upload</label>
									<input type="file" name="image" value="Choose" style="width: 40%">


								</div>

								<button type="submit" class="btn btn-primary">ADD</button>
							</div>
						</div>
					</div>
						</form>

						
					<button  class="btn btn-primary btn-md pull-right"><a href="signout.php" style="color: white;">Log Out </a></button>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	
</body>

</html>
