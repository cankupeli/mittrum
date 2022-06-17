<?php
require_once "dbh.php";
//Delete the post with the ID of clicked review from the table
$var = $_GET["index"];
$sql = "DELETE FROM review WHERE ID =" . $var;
if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully";
} 
else{
    echo "Error deleting post: " . $conn->error;
}
header("Location:" . $_SERVER['HTTP_REFERER']);