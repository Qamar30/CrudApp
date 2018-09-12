<?php 
// Process delete operation after confirmation

if (isset($_POST["id"]) && !empty($_POST["id"])) {
	
  // include config file

	require_once "config.php";

//Prepare a delete statement
	$sql="Delete FROM employees WHERE id=?";

	if($stmt=$mysqli->prepare($sql)) {

		//Bind variables to the prepared statement as parameters

		$stmt->bind_param("i", $param_id);


		//set parameters

		$param_id= trim($_POST["id"]);

		// attempt to execute thhe prepared statement



		if ($stmt->execute()) {
			
		// Records deleted successfully. Redirect to landing page

			header("location: index.php");
			exit();

		} else {
			echo "Oh no, something went wrong. Please try again later.";
		}


	}


// close statement

	$stmt->close();

	// close connection

	$mysqli>close();


} else {

// check existence of id parameter

	if (empty(trim($_GET["id"]))) {
		//url doesn`t  contain id parameter. Redirect to error page
		header("location: error.php");
		exit();

	}
}


 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            
        }
    </style>
</head>
<body>
    <div class="wrapper text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>