<?php
require_once "dbh.php";
//A class for each review
class message{
    public $ID;
    public $username;
    public $review_text;
    public $review_time;
    public $review_rating;
    public $house_letter;
    public $room_number;
    public $seating;
    public $whiteboard;
    public $projector;
    function __construct($ID, $house_letter, $room_number, $username, $review_rating, $review_text, $review_time){
        $this->ID = $ID;
        $this->username = $username;
        $this->review_text = $review_text;
        $this->review_time = $review_time;
        $this->review_rating = $review_rating;
        $this->house_letter = $house_letter;
        $this->room_number = $room_number;
        //Gathers data about the current room.
        $sql = "SELECT seating, whiteboard, projector FROM room WHERE house_letter = '" . $house_letter . "' AND room_number = '". $room_number . "'";
        $conn = db();
        $result = $conn->query($sql);
        $posting = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $aPost = [$row["seating"],$row["whiteboard"],$row["projector"]];
                array_push($posting, $aPost);
            }
        }
        $this->seating = $posting[0][0];
        $this->whiteboard = ($posting[0][1] == 1) ? "Yes" : "No";
        $this->projector = ($posting[0][2] == 1) ? "Yes" : "No";
    }
    function printing(){
        //print function for the review, if the review was posted by current user or current user is admin, give the review a delete button
        if ($_SESSION["useruid"] == $this->username || $_SESSION["useruid"] == "admin"){
            echo
            "<div class='posts'>".
            "<form action = 'functions/delete.php' method='get'>".
                "<h2 class='reviewTitle'>". $this->house_letter .  $this->room_number . "&nbsp;&nbsp;-&nbsp;&nbsp;" . $this->review_rating . "/5</h2>".
                "<h2 class='descriptive'><em>". "Seats: " . $this->seating  . " Whiteboard: " . $this->whiteboard . " Projector: " . $this->projector . "</em></h2>".
                "<h2 class='reviewName'>". $this->username . "</h2>".
                "<h3 class='reviewText'>". $this->review_text . "</h3>".
                "<h5 class='reviewTime'><time>". $this->review_time . "</time></h5>".
                "<a href='functions/delete.php?index=" . $this->ID . "' class='deleteBtn' >Delete</a>".
            "</form>".
            "</div>";
        }
        else{
            echo
            "<div class='posts'>".
            "<form action = 'functions/delete.php' method='get'>".
                "<h2 class='reviewTitle'>". $this->house_letter .  $this->room_number . "&nbsp;&nbsp;-&nbsp;&nbsp;" . $this->review_rating . "/5</h2>".
                "<h2 class='descriptive'><em>". "Seats: " . $this->seating  . " Whiteboard: " . $this->whiteboard . " Projector: " . $this->projector . "</em></h2>".
                "<h2 class='reviewName'>". $this->username . "</h2>".
                "<h3 class='reviewText'>". $this->review_text . "</h3>".
                "<h5 class='reviewTime'><time>". $this->review_time . "</time></h5>".
            "</form>".
            "</div>";
        }
    }
}
?>