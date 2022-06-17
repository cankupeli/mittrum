<?php
require_once "header.php";
require_once "navbar.php";
require_once "functions/message.php";
require_once "functions/dbh.php";
//Check if session has been activated (user is logged in), if not send them to login page
if(!isset($_SESSION["useruid"])){
    header("location: index.php?error=NotLoggedIN");
}
?>
        <div class = "adaptiveBox">
            <div class = "options">
                <h3 class = "guideText">Welcome <?php echo $_SESSION["useruid"] ?>! <br> Prepare to express yourself!</h3>
            </div>  
        </div>
<!-- A wrapper class for logging out, which facilitates the input data in the form of a post-method-->
        <div class = "containerLog2" > 
            <form action = "functions/logout.php" method = "post">
                <div class = "options">
                    <button type = "submit" name = "submit" class = "submitBtn">Logout</button>
                </div>  
            </form>
        </div>
<!-- A wrapper class with a script to retrieve and post all reviews-->
        <section id="allPosts">
        <?php
            $sql = "SELECT * FROM review";
            $result = $conn->query($sql);
            $posting = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $aPost = [$row["ID"],$row["house_letter"],$row["room_number"],$row["username"],$row["review_rating"],$row["review_text"],$row["review_time"]];
                    array_push($posting, $aPost);
                }
            }
            for($i = count($posting) - 1; $i >= 0; $i--){
                $thing = new message($posting[$i][0],$posting[$i][1],$posting[$i][2],$posting[$i][3],$posting[$i][4], $posting[$i][5],$posting[$i][6]);
                $thing->printing();
            }
        ?>
        </section>
    </body>
</html>