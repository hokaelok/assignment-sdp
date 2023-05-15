<?php
//connect database
include ("conn.php");
session_start();
//get tutorial_ID
$Tutorial_ID = $_GET['Tutorial_ID'];

//delete the data from database
$sql ="DELETE FROM tutorial WHERE Tutorial_ID='$Tutorial_ID'";
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    else {
    echo "<script>
            alert('Tutorial had been deleted.');
            javascript:history.go(-1);
            </script>";
    }

// close database connection
mysqli_close($con);
?>