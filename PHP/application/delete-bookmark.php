<?php
//connect database
include ("conn.php");
// session start
session_start();

//get Tutorial_ID and user_email
$Tutorial_ID = $_GET['Tutorial_ID'];

if(isset($_SESSION["student_email"])){
    $Email =$_SESSION["student_email"];

//delete the data from database
$sql ="DELETE FROM bookmark WHERE Tutorial_ID='$Tutorial_ID' AND Email='$Email'";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
    echo "<script>
            alert('Bookmark had been deleted.');
            javascript:history.go(-1);
            </script>";
    }
}

// close database connection
mysqli_close($con);
?>