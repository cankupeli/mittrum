<?php
require_once "header.php";
require_once "functions/message.php";
require_once "functions/dbh.php";
?>
<!-- A wrapper class for creating an account, which facilitates the input data in the form of a post-method-->
        <div class = "adaptiveBox" > 
            <form action = "functions/creation.php" method="post">
                <div class = "options">
                <h3 class = "guideText">Create an Account!</h3>
                <input type = "text" name = "user" id = "inputName" placeholder = "Username...">
                <input type = "password" name = "pass" id = "inputText" placeholder = "Password...">
                <br>
                <button type = "submit" name = "createAccount" class = "submitBtn">Create Account</button>
                <br>
                <button type = "submit" name = "backHome" class = "submitBtn">Go Home</button>
                </div>  
            </form>
        </div>
    </body>
</html>