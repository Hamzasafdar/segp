<?php
$conn = mysqli_connect('localhost','root','','segp');
session_start();
// if (!(isset($_SESSION['admin']))) {
//   header("location:login.php");
// }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Assign Groups</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		<form role="search" action="search.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search" name="search"><br>
				<input type="submit" value="Search"  class="btn btn-primary">
			</div>
		</form>
		<ul class="nav menu">
			<ul class="nav menu">
			<li><a href="forms.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Add New Student</a></li>
			<li><a href="creategroup.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Create Group</a></li>
			<li class="active"><a href="group.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Assign Groups</a></li>
			<li><a href="Report.php"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Download Data As PDF</a></li>
			<li><a href="upload.php"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Upload File</a></li>
			<li><a href="display.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Students</a></li>
			<li><a href="displaystaff.php.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Staff</a></li>
			<li><a href="displaygroups.php"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Display Group</a></li>
		</ul>
		</ul>

	</div><!--/.sidebar-->







<!-- Modal For Create Group And Assign Tutor-->
					<?php

                	$ye=$_POST['year'];
                	$_SESSION['sal']=$ye;
                	?>
    <div  class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <center><h4 class="modal-title">Welcome To Create Group And Assign Tutor</h4></center>
          </div>
          <div class="modal-body" >

            <!--form start-->
            <form class="form-horizontal" method="post" action="assigngroup.php">

              <div class="form-group">
                <label class="control-label col-sm-5">Group Name:</label>
                
                <div class="col-sm-4">
                	
                  <select class="form-control"  method="post" name="group">
										<option disabled selected>Select Group</option>
										<?php
										
										$sql = "SELECT * FROM groups where year='$ye'";
										$result = $conn->query($sql);
										while($row = $result->fetch_assoc()) {
        								echo "<option value='".$row["group_name"]."'>".$row["group_name"]."</option>";
   										 }
   										 $row= mysqli_fetch_row($result);
										$id=$row[0];
										?>

									</select>
                </div>




              </div>

			<div class="form-group"></div>
              <div class="form-group">
                <label class="control-label col-sm-5">UOB:</label>
                <div class="col-sm-4" >

                  <input type="text" required class="form-control" placeholder="Enter UOB" name="uob">
                </div>
              </div>

              <div class="row">
            <div class="col-sm-12">
              <div class="modal-footer">
                <input type="submit" class="btn btn-info" value="Save">
              </div>
            </div>
          </div>
              
            </form>
            
          </div>
          
        </div>
        
      </div>
    </div>








		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Student To Groups</h1>
			</div>
		</div><!--/.row-->
				

		<form method="post" >
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

								<div class="form-group has-success">
									<div  style="margin-left: 5%;">
									<br>
									<select class="form-control" name="year" style="width: 40%" method="post" onchange="this.form.submit()">
										<option disabled selected>Select Year</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select><br>

									
								
								 
								</div>
								</div>

							</div>

						</div>
					</div>
						</form>






						<div class="panel-body">
						<div class="RackList">
							<?php 
							
								$sql = "SELECT * FROM student_data WHERE year = '$ye' AND groupno=0";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
    
									echo "<table class='table table-hover'>";
									echo "<thead><tr> <th>Name</th><th>Father Name</th><th>UOB</th><th>CNIC</th><th>Department</th><th>Year</th></tr></thead><tbody>";
    									while($row = $result->fetch_assoc()) {
        									echo "<tr><td>".$row["name"]."</td><td>".$row["f_name"]."</td><td>".$row["uob"]."</td><td>".$row["cnic"]."</td><td>".$row["department"]."</td><td>".$row["year"]."</td>";  

        									

        									?>

        											


        							<?php
        							}			
    									

									echo "</tbody></table>";
								} else {
    								echo "0 results";
								}
								$conn->close();
							
 							?>
 							<td> <input type="button" value="Assign" class="btn btn-default btn-md pull-right"  class="btn-link" data-toggle="modal" data-target="#myModal" ></td>

						</div>
					</div>







					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	
</body>

</html>
