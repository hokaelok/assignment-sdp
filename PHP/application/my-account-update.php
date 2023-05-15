<?php
ob_start();
session_start();
include "conn.php";

if(isset($_POST['save-profile-btn'])) {
    $id = $_SESSION['student_email'];

    $u_name = $_POST['u_name'];
    if(($_POST['u_name'] == '')) {
        $u_name = $_SESSION["student_name"];
    }
    $u_phnum = $_POST['u_phnum'];
    if(($_POST['u_phnum'] == '')) {
        $u_phnum = $_SESSION["student_phnum"];
    }
    $u_pw = $_POST['u_pw'];
    if(($_POST['u_pw'] == '')) {
        $u_pw = $_SESSION["student_pw"];
    }

    $select= "SELECT * FROM student WHERE Email='$id'";
    $sql = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($sql);
    $update_profile = "UPDATE student SET Student_Name='$u_name', Contact_Number='$u_phnum', Password='$u_pw' WHERE Email='$id'";
    $_SESSION["student_name"] = $u_name;
    $_SESSION["student_phnum"] = $u_phnum ;
    $_SESSION["student_pw"] = $u_pw;
    $sql2 = mysqli_query($con, $update_profile);
    if(isset($sql2))
        { 
            /*Successful*/
            echo"<script>alert('Update successful!');</script>";
            header('location:my-account.php');
        }
        else
        {
            /*sorry your profile is not update*/
            echo "<script>alert('Update unsuccessful');</script>";
            header('location:my-account.php');
        }
    }
else if(isset($_POST['save-btn'])) {
    $id = $_SESSION['teacher_email'];

    $u_name = $_POST['u_name'];
    if(($_POST['u_name'] == '')) {
        $u_name = $_SESSION["teacher_name"];
    }
    $u_phnum = $_POST['u_phnum'];
    if(($_POST['u_phnum'] == '')) {
        $u_phnum = $_SESSION["teacher_phnum"];
    }
    $u_pw = $_POST['u_pw'];
    if(($_POST['u_pw'] == '')) {
        $u_pw = $_SESSION["teacher_pw"];
    }

    $select= "SELECT * FROM teacher WHERE Teacher_Email='$id'";
    $sql = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($sql);
    $update_profile = "UPDATE teacher SET Teacher_Name='$u_name', Phone_Number='$u_phnum', Password='$u_pw' WHERE Teacher_Email='$id'";
    $_SESSION["teacher_name"] = $u_name;
    $_SESSION["teacher_phnum"] = $u_phnum ;
    $_SESSION["teacher_pw"] = $u_pw;
    $sql2 = mysqli_query($con, $update_profile);
    if(isset($sql2))
        { 
            /*Successful*/
            echo"<script>alert('Update successful!');</script>";
            header('location:my-account.php');
        }
        else
        {
            /*sorry your profile is not update*/
            echo "<script>alert('Update unsuccessful');</script>";
            header('location:my-account.php');
        }
    }
else if(isset($_POST['save-p-btn'])) {
    $id = $_SESSION['admin_email'];

    $u_name = $_POST['u_name'];
    if(($_POST['u_name'] == '')) {
        $u_name = $_SESSION["admin_name"];
    }
    $u_phnum = $_POST['u_phnum'];
    if(($_POST['u_phnum'] == '')) {
        $u_phnum = $_SESSION["admin_phnum"];
    }
    $u_pw = $_POST['u_pw'];
    if(($_POST['u_pw'] == '')) {
        $u_pw = $_SESSION["admin_pw"];
    }

    $select= "SELECT * FROM admin WHERE Admin_Email='$id'";
    $sql = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($sql);
    $update_profile = "UPDATE admin SET Admin_Name='$u_name', Contact_Number='$u_phnum', Password='$u_pw' WHERE Admin_Email='$id'";
    $_SESSION["admin_name"] = $u_name;
    $_SESSION["admin_phnum"] = $u_phnum ;
    $_SESSION["admin_pw"] = $u_pw;
    $sql2 = mysqli_query($con, $update_profile);
    if(isset($sql2))
        { 
            /*Successful*/
            echo"<script>alert('Update successful!');</script>";
            header('location:my-account.php');
        }
        else
        {
            /*sorry your profile is not update*/
            echo "<script>alert('Update unsuccessful');</script>";
            header('location:my-account.php');
        }
    }
else
    {
        /*sorry your id is not match*/
        echo"<script>alert('Update unsuccessful');</script>";
    }
?>