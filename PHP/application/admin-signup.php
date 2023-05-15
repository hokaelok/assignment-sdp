<?php
// connect to database
include("conn.php");
session_start();
if (isset($_SESSION["admin_email"])) {
    $Admin_Email=$_POST["Admin_Email"];
    $Admin_Name=$_POST["Admin_Name"];
    $SignUp_password=$_POST["SignUp_password"];
    $Position=$_POST["Position"];
    $phnum=$_POST["phnum"];

    // check whether data exist in database
    $result=mysqli_query($con,"SELECT * FROM admin WHERE Admin_Email='$Admin_Email' limit 1");
    // if data exist display data exist
    if(mysqli_num_rows($result)==1){
        echo "<script>
        alert('Account exists.');
        window.location.href = 'signup-admin-panel.php';
        </script>";
        mysqli_close($con);
    }
    // if data not exist insert data into database
    else{
        $sql="INSERT INTO admin (Admin_Email, Admin_Name, Contact_Number, Password, Position)
        VALUES
        ('$_POST[Admin_Email]','$_POST[Admin_Name]','$_POST[phnum]','$_POST[SignUp_password]','$_POST[Position]')";
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
            }
            else {
            echo '<script>
            javascript:history.go(-1);
            </script>';
            }
        }
        mysqli_close($con);
    }
?>