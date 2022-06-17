<?php
//A function to connect to the database, required to connect to database within the class as it is out of scope.
//"studentmysql.miun.se", "caku2002", "9sdslnbl", "caku2002"
//"localhost", "root", "", "project"
function db () {
    static $conn;
    if ($conn===NULL){ 
        $conn = mysqli_connect("localhost", "root", "", "project");
    }
    return $conn;
}
$conn = db();
//If a database connection was not successful (the connection variable was not given a value) terminate the script. 
if(!$conn) {
    die("Failed to connect");
}
?>