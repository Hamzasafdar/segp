<?php  
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
			
    if(isset($_POST["submit"]))
    {
   
     if($_FILES['file']['name'])
     {
      $filename = explode(".", $_FILES['file']['name']);
      if($filename[1] == 'csv')
      {   
          
        $handle = fopen($_FILES['file']['tmp_name'], "r");
        while(! feof($handle))
		{
			$data = (fgetcsv($handle));
		    // Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$query = "INSERT INTO student_data 
						VALUES ('',$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]' , '' , '')"; 
			$conn->query($query);
		}
		//$conn->close();

	  
   
      }
	  	$conn->close();
			
     }
     }
    
    ?>  
    <!DOCTYPE html>  
    <html>  
     <head>  
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     </head>  
     <body>  
      <form method="post" enctype="multipart/form-data">
       <div align="center">  
        <label>Select CSV File:</label>
        <input type="file" name="file" />
        <br />
        <input type="submit" name="submit" value="Import" class="btn btn-info" />
       </div>
      </form>
     </body>  
    </html>