<?php
require_once "dbh.php";
//If this create account functionality was accessed through the create account button, attempt to create account user in (check credentials)
if(isset($_POST["createAccount"])){
    $exists = 0;
    $sql = "SELECT * FROM account";
    $result = $conn->query($sql);
    $posting = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $aPost = [$row["username"],$row["password"]];
            array_push($posting, $aPost);
        }
    }
    //Do not create account if user already exists in database
    for($i = count($posting) - 1; $i >= 0; $i--){
        if ($posting[$i][0] == $_POST["user"]){
            //$exists++;
            header("location: ../createAccount.php?error=AlreadyExists");
            exit();
        }
    }
    //Do not create account if no credentials are given
    if ($_POST["user"] == "" || $_POST["pass"] == "" ){
        $exists++;
        header("location: ../createAccount.php?error=NoInputGiven");
        exit();
    }
    //Create account if user does not already exists in database 
    if ($exists == 0){
        $username = $_POST["user"];
        $password = $_POST["pass"];
        $sql = "INSERT INTO account (username, password) VALUES (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        header("Location: ../index.php");
        exit();
    }
}
//If this creation functionality was not accessed through the createAccount button, send user back to index (login page)
else{
    header("location: ../index.php");
    exit();
}