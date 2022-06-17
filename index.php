<?php
session_start();
require_once "header.php";
require_once "functions/message.php";
require_once "functions/dbh.php";
?>
<!-- A wrapper class for logging in, which facilitates the input data in the form of a post-method-->
    <div class = "adaptiveBox" > 
      <form action = "functions/login.php" method="post">
        <div class="options">
          <h3 class = "maintext" id = "welcome">Welcome to the Mid Sweden University's first and only grouproom reviewing site!
          A place for ideas and opinions to come together. Together we share a vision of communal solidarity. To hold the school accountable 
          and achieve the global standard in grouproom cleanliness!</h3>
          <input type = "text" name = "user" id = "inputName" placeholder = "Username...">
          <input type = "password" name = "pass" id = "inputText" placeholder = "Password...">
          <br>
          <button type = "submit" name = "submit" class = "submitBtn">Login</button>
          <br>
          <button type = "submit" name = "createAccount" class = "submitBtn">Or Create an Account</button>
        </div>  
      </form>
    </div>
  </body>
</html>