<?php
session_start();
require_once "dbh.php";
date_default_timezone_set("Europe/Stockholm");
//On submit press, capture the given data and current date and add it to the database
if(isset($_POST["submit"])){
    $username = $_SESSION["useruid"];
    $houseLetter = $_GET["house"];
    $roomNumber = $_POST["room"];
    $reviewRating = $_POST["rating"];
    $reviewText = $_POST["inputText"];
    $reviewTime = date("Y-m-d") . " " . date("h:i:s");
    $sql = "INSERT INTO review (house_letter, room_number, username, review_rating, review_text, review_time) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $houseLetter, $roomNumber, $username, $reviewRating, $reviewText, $reviewTime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header("Location: ../house.php?house=" . $_GET["house"]);
}
?>
