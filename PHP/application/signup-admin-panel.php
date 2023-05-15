<!DOCTYPE html>
<html lang="en">
<head>
    <!-- page title -->
    <title>Remi Education</title>

    <!-- common meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- stylesheet links -->
    <link href="../style.css" rel="stylesheet" />
    <link href="../build/css/style.css" rel="stylesheet" />
    <link href="../application/css/style.css" rel="stylesheet" />

    <!-- import jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- css styling -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        .background {
            width: 100%;
            height: 120%;
            -webkit-background-size: cover;
            background-size: cover;
            background-position: center center;
            background-color: rgb(150, 182, 239);
            position: fixed;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0 0 0 50;
        }

        #return {
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
            border: none;
            background-color: white;
            color: rgb(164, 182, 239);
            padding:5px;
            margin-top:5px;
            font-size:10px;
        }

        .container button {
            border-radius: 20px;
            border: 1px solid rgb(164, 182, 239);
            background-color: rgb(164, 182, 239);
            color: #FFFFFF;
            font-size: 13px;
            font-weight: bold;
            padding: 10px 45px;
            margin-top: 15px;
            letter-spacing: 3px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .container button:active {
            transform: scale(0.95);
        }

        .container button:focus {
            outline: none;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 50px;
            height: 100%;
            transform: translateX(70px);
        }

        input,select {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 80%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 50%;
            height: 75%;
            max-width: 100%;
        }

        .register-form {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-up-area {
            left: 0;
            width: 80%;
            z-index: 2;
        }
</style>
</head>

<body>
    <!-- Main Content -->
    <div class="background"></div>
    <div class="container">
        
        <!-- Sign In Form -->
        <div class="register-form sign-up-area">
        <a href="mainpage.php">
            <button id="return"> < Back </button>
        </a>
            <form action="admin-signup.php" method="POST">
                <h1>Sign Up New Admin</h1>
                <!-- Request Staff ID -->
                <input type="email" placeholder="Admin Email" name="Admin_Email" required/>
                <!-- Request Staff Name -->
                <input type="text" placeholder="Admin Name" name="Admin_Name" required/>
                <!-- Request Password -->
                <input type="password" placeholder="Password" name="SignUp_password" required/>
                <!-- Request Position -->
                <select name="Position" required>
                    <option value="">Please Select Material Type</option>
                    <option value="Staff">Staff</option>
                    <option value="Manager">Manager</option>
                </select>
                <!-- Request Phone Number -->
                <input type="text" placeholder="01xxxxxxxx" pattern="[0][1][0-9]{8}" name="phnum" required/>
                <!-- Submit Button -->
                <button type="submit" name="SignUp_button">Sign Up</button>
            </form>
        </div>
    </div>

</body>
</html>

<?php 
    if(isset($_POST["SignUp_button"])){
        $Admin_Email=$_POST["Admin_Email"];
        $Admin_Name=$_POST["Admin_Name"];
        $SignUp_password=$_POST["SignUp_password"];
        $Position=$_POST["Position"];
        $phnum=$_POST["phnum"];
        }
?>