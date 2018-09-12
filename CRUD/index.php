<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

        <style type="text/css">
        .wrapper{
        width: 650px;
        margin: 0 auto;
        margin-top: 50px;
        }
        .page-header h2{
        margin-top: 0;
        }
        table tr td:last-child a{
        margin-right: 15px;
        }
        </style>
        <script type="text/javascript">
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        });
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Employees Details</h2>
                            <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                             
                        </div>
                        <?php
                        // Include config file
                        require_once 'config.php';
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM employees";
                        if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                        echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Address</th>";
                                    echo "<th>Salary</th>";
                                    echo "<th>Action</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                                while($row = $result->fetch_array()){
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['salary'] . "</td>";
                                    echo "<td>";
                                        echo "<a href='read.php?id=". $row['id'] ." 'title='View Record' data-toggle='tooltip'><i class='fas fa-eye'></i></a>";
                                        echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><i class='fas fa-hourglass'></i></a>";
                                        echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><i class='fas fa-trash-alt'></i></a>";
                                    echo "</td>";
                                echo "</tr>";
                                }
                            echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        $result->free();
                        } else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                        } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                        }
                        
                        // Close connection
                        $mysqli->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>