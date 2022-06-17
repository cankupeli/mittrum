<?php
//Destroys session, essentially logging the user out and returning them to index (login page)
session_start();
session_unset();
session_destroy();
header("location: ../index.php");