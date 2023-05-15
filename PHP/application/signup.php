<?php
    // connect to database  
    include("conn.php");
    $SignUp_name=$_POST["SignUp_name"];
    $SignUp_phoneNum=$_POST["SignUp_phoneNum"];
    $SignUp_email=$_POST["SignUp_email"];
    $SignUp_password=$_POST["SignUp_password"];
    $SignUp_accType=$_POST["SignUp_accType"];

    //signup as student
    if($SignUp_accType=="student"){

    $result=mysqli_query($con,"SELECT * FROM student WHERE Email='$SignUp_email' limit 1");
    
    //check whether data exist in database
    if(mysqli_num_rows($result)==1){
        echo "<script>
        alert('Account exists.');
        window.location.href = 'registration-panel.php';
        </script>";
        mysqli_close($con);
    }
    
    //if data not exist then insert data into database
    else{
        $sql="INSERT INTO student (Email, Student_Name, Contact_Number, Password)
        VALUES
        ('$_POST[SignUp_email]','$_POST[SignUp_name]','$_POST[SignUp_phoneNum]','$_POST[SignUp_password]')";
        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
            }
            else {
            session_start();
            echo '<script>
            window.location.href = "dumbass_page.php";
            </script>';
            }
        }}
    
    //signup as teacher
    if($SignUp_accType=="teacher"){

        $result=mysqli_query($con,"SELECT * FROM teacher WHERE Teacher_Email='$SignUp_email' limit 1");
        
        //check whether data exist in database
        if(mysqli_num_rows($result)==1){
            echo "<script>
            alert('Account exists.');
            window.location.href = 'registration-panel.php';
            </script>";
            mysqli_close($con);
        }

        //if data not exist then insert data into database
        else{
            $sql="INSERT INTO teacher (Teacher_Email, Teacher_Name, Phone_Number, Password, Status)
            VALUES
            ('$_POST[SignUp_email]','$_POST[SignUp_name]','$_POST[SignUp_phoneNum]','$_POST[SignUp_password]','Active')";
            if (!mysqli_query($con,$sql)) {
                die('Error: ' . mysqli_error($con));
                }
                else {
                session_start();
                echo '<script>
                window.location.href = "dumbass_page.php";
                </script>';
                }
            }
        }
        mysqli_close($con);
?>