<?php
include("conn.php"); 
// ref = https://www.w3schools.com/php/php_mysql_select.asp
// ref 2 = https://www.youtube.com/watch?v=gCo6JqGMi30&ab_channel=DaniKrossing
session_start();
if (isset($_SESSION["student_email"])) {
    $Tutorial_ID = $_GET["Tutorial_ID"];
    $today = date('Y-m-d');
    $email = $_SESSION["student_email"];

    $sql = "SELECT * FROM bookmark WHERE Tutorial_ID = '$Tutorial_ID' AND Email = '$email'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        echo "<script>
        alert('Bookmark is already exist.');
        javascript:history.go(-1);
        </script>";
    } 
    else {
        $sql = "INSERT INTO bookmark
        (Email,Tutorial_ID, Date) 
        VALUES ('$email','$Tutorial_ID','$today')";
        if(mysqli_query($con,$sql)){
            echo "<script>
                alert('Bookmark is added.');
                javascript:history.go(-1);
                </script>";
            exit();
        }
    }
}	
else {
    echo"<script>
        alert('Only student can add bookmark.');
        javascript:history.go(-1);
        </script>";
};
?>	