<?php  


/* Database credentials. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

define('Server', 'localhost');

define('Username', 'root');

define('Password', '');

define('Database', 'crudapp');

 





/* Attempt to connect to MySQL database */

$mysqli = new mysqli(Server,Username,Password,Database);

 

// Check connection

if($mysqli === false){

    die("ERROR: Could not connect. " . $mysqli->connect_error);

}

?>






