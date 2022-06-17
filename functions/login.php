<?php
require_once "dbh.php";
//If this login functionality was accessed through the login button, attempt to log user in (check credentials)
if(isset($_POST["submit"])){
    $sql = "SELECT * FROM account";
    $result = $conn->query($sql);
    $posting = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $aPost = [$row["username"],$row["password"]];
            array_push($posting, $aPost);
        }
    }
    //Go through all users in database to determine if any columns match the given user and pass 
    for($i = count($posting) - 1; $i >= 0; $i--){
        if ($posting[$i][0] == $_POST["user"] && $posting[$i][1] == $_POST["pass"]){
            session_start();
            $_SESSION["useruid"] = $posting[$i][0];
            $_SESSION["name"] = $posting[$i][0];
            header("location: ../mainpage.php");
            exit();
        }
    }
    //If the $_SESSION variable was not given a value (user is not logged in), send user to home page
    if (!isset($_SESSION["useruid"])){
        header("location: ../index.php?error=wrongLogin");
        exit();
    }
}
//if create account button was clicked send user to the create account page
else if(isset($_POST["createAccount"])){
    header("location: ../createAccount.php");
}
//If this login functionality was not accessed through the login button, send user back to index (login page)
else{
    header("location: ../index.php");
    exit();
}

