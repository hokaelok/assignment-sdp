<?PHP 
    //connect to database
    include('conn.php');
    $SignIn_email=$_POST["SignIn_email"];
    $SignIn_password=$_POST["SignIn_password"];
    $SignIn_accType=$_POST["SignIn_accType"];

    //student login
    if($SignIn_accType=="student"){
    $sql=mysqli_query($con,"SELECT Email, Password FROM student WHERE Email='$SignIn_email' AND Password='$SignIn_password' limit 1");
    
    //Check is the data available in database
    if(mysqli_num_rows($sql)==1)
    {
        //retrieve data from database
        $data=mysqli_fetch_array($sql);

        $user=$data['Email'];

        session_start();
        $user_data_result = mysqli_query($con, "SELECT * FROM student WHERE Email='$user' limit 1");
        $user_data = mysqli_fetch_array($user_data_result);
        $_SESSION["student_email"] = $user_data['Email'];
        $_SESSION["student_name"] = $user_data['Student_Name'];
        $_SESSION["student_pw"] = $user_data['Password'];
        $_SESSION["student_phnum"] = $user_data['Contact_Number'];

        header("location: mainpage.php");
        exit();
    }
    else
    {
        echo"<script>
            alert('Failed to login.');
            javascript:history.go(-1);
            </script>";
    };
}

    //teacher login
    else if ($SignIn_accType=="teacher"){
        $sql=mysqli_query($con,"SELECT Teacher_Email, Password FROM teacher WHERE Teacher_Email='$SignIn_email' AND Password='$SignIn_password' limit 1");
    
        //Check is the data available in database
    if(mysqli_num_rows($sql)==1)
    {
        //retrieve data from database
        $data=mysqli_fetch_array($sql);

        $user=$data['Teacher_Email'];

        session_start();
        $user_data_result = mysqli_query($con, "SELECT * FROM teacher WHERE Teacher_Email='$user' limit 1");
        $user_data = mysqli_fetch_array($user_data_result);
        $_SESSION["teacher_email"] = $user_data['Teacher_Email'];
        $_SESSION["teacher_name"] = $user_data['Teacher_Name'];
        $_SESSION["teacher_pw"] = $user_data['Password'];
        $_SESSION["teacher_phnum"] = $user_data['Phone_Number'];
        $_SESSION["teacher_status"] = $user_data['Status'];

        header("location: mainpage.php");
        exit();
    }
    else
    {
        echo"<script>
            alert('Failed to login.');
            javascript:history.go(-1);
            </script>";
    }
}

    //admin login
    else if ($SignIn_accType=="admin"){
        $sql=mysqli_query($con,"SELECT Admin_Email, Password FROM admin WHERE Admin_Email='$SignIn_email' AND Password='$SignIn_password' limit 1");
    
        //Check is the data available in database
    if(mysqli_num_rows($sql)==1)
    {
        //retrieve data from database
        $data=mysqli_fetch_array($sql);

        $user=$data['Admin_Email'];

        session_start();
        $user_data_result = mysqli_query($con, "SELECT * FROM admin WHERE Admin_Email='$user' limit 1");
        $user_data = mysqli_fetch_array($user_data_result);
        $_SESSION["admin_email"] = $user_data['Admin_Email'];
        $_SESSION["admin_name"] = $user_data['Admin_Name'];
        $_SESSION["admin_pw"] = $user_data['Password'];
        $_SESSION["admin_phnum"] = $user_data['Contact_Number'];
        $_SESSION["admin_position"] = $user_data['Position'];

        header("location: mainpage.php");
        exit();
    }
    else
    {
        echo"<script>
            alert('Failed to login.');
            javascript:history.go(-1);
            </script>";
    }}
?>
