<?php
require_once "header.php";
require_once "navbar.php";
require_once "functions/message.php";
require_once "functions/dbh.php";
//Check if session has been activated (user is logged in), if not send them to login page
if(!isset($_SESSION["useruid"])){
    header("location: index.php?error=NotLoggedIN");
}
$house = $_GET["house"];
?>
<!-- A wrapper class for leaving a review, which facilitates the input data in the form of a post-method-->
        <div class = "adaptiveBox" > 
            <form action = "functions/post.php?house=<?php echo $house; ?>" method = "post">
                <div class = "options">
                    <h2 class = "reviewHouse"><?php echo $house; ?> HOUSE</h2>
                    <!-- Retrieving current houses rooms to create a drop-down menu-->
                    <?php
                        echo '<label for = "room" class = "maintext">ROOM:</label>
                        <select id = "room" name = "room">';
                        $sql = "SELECT room_number, seating FROM room WHERE house_letter = '" . $house . "'";
                        $result = $conn->query($sql);
                        $posting = [];
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $aPost = [$row["room_number"], ["seating"]];
                                array_push($posting, $aPost);
                            }
                        }
                        for($i = 0; $i < count($posting); $i++){
                            echo '<option value = "' . $posting[$i][0] . '">' . $posting[$i][0] . '</option>';
                        }
                        echo '</select>';
                    ?>
                    <br>
                        <label for = "rating" class = "maintext">RATING:</label>
                        <select id = "rating" name = "rating">
                            <option value = "0">0</option>
                            <option value = "1">1</option>
                            <option value = "2">2</option>
                            <option value = "3">3</option>
                            <option value = "4">4</option>
                            <option value = "5">5</option>
                        </select>
                    <br>
                    <input type = "text" name = "inputText" id = "inputText" placeholder = "Review Text...">
                    <br/>
                    <button type = "submit" name = "submit" class="submitBtn">Post Review</button>
                </div>  
            </form>
        </div>
<!-- A wrapper class for logging out, which facilitates the input data in the form of a post-method-->
        <div class = "containerLog2" > 
                <form action = "functions/logout.php" method = "post">
                    <div class = "options">
                        <button type = "submit" name = "submit" class = "submitBtn">Logout</button>
                    </div>  
                </form>
        </div>
<!-- A wrapper class with a script to retrieve and post all reviews that review a room within the current house-->
        <section id="allPosts">
        <?php
            $sql = "SELECT * FROM review WHERE house_letter = '" . $house . "'";
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