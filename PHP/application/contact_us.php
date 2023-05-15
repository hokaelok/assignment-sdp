<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
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

    <!-- render header script -->
    <script>
        $(function() {
            $("#footer").load("common/footer.php");
        });
    </script>

    <!-- CSS -->
    <style>
        input[type=text],
        input[type=email],
        select,
        textarea {
            background-color: #eee;
            border: none;
            padding: 12px 10px;
            margin: 8px 0;
            width: 600px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 40px;
            margin-left: 150px;
            height: 100%;
            transform: translateX(70px);
        }

        .button {
            border-radius: 20px;
            border: 3px solid rgb(226, 187, 226);
            background-color: rgb(219, 191, 221);
            color: black;
            font-size: 17px;
            font-weight: bold;
            padding: 0.75rem;
            margin-top: 15px;
            letter-spacing: 3px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .section {
            float: center;
            margin-bottom: 30px;
            width: 700px;
        }

        .label {
            float: center;
            margin-left: -50px;
        }

        .content {
            margin: 150px 300px;
            height: auto;
            background: linear-gradient(to right, lightblue , rgb(200,210,205));
        }

        .input-type{
            border-radius: 10px;
            width:220px;
            height:40px;
            color:grey;
            font:bold 30px;
        }

        .text-area{
            border-radius: 10px;
            width:600px;
            height:100px;
            color:grey;
            font:bold 30px;
        }
    </style>
</head>

<body>
<!-- Header -->
<?php
session_start();
if (isset($_SESSION["student_email"])) {
    include('common/users-header.php');
}
else if (isset($_SESSION["teacher_email"])) {
    include('common/users-header.php');
}
else if (isset($_SESSION["admin_email"])) {
    include('common/users-header.php');
}
else{
    include('common/header.php');
}
?>
<!-- Main Content -->
<div class="flex flex-col bg-blue-100 h-full relative">
    <div class=" mt-24">
    <p class="text-5xl text-center text-black font-bold ml-4">Contact Us</p>
    <p class="text-2xl text-center text-black font-bold ml-4">Email: remi_educationn@gmail.com<br>
        Contact Number: 0192881777</p>
    <!-- Form  -->
    <form action="#" method="POST">
        <div class="section">
            <div class="label">
                <select class="input-type" name="issues" required>
                    <option value="">Please Select Issues</option>
                    <option value="Bugs">Bugs</option>
                    <option value="CreateTopic">Create New Topic</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="section">
            <div class="label">
                <input class="input-type" type="text" placeholder="Name" name="contact_name" required="required" />
            </div>
        </div>
        <div class="section">
            <div class="label">
                <input class="input-type" type="email" placeholder="Email" name="contact_email" required="required" />
            </div>
        </div>
        <div class="section">
            <div class="label">
                <textarea class="text-area" placeholder="  Message" name="message" required></textarea>
            </div>
        </div>
        <div class="section">
            <div class="label">
                <button type="submit" name="Submit" class="button bg-[#dbbfdd]">Submit</button>
            </div>
        </div>
    </form>
    </div>
</div>
</body>

<!-- Footer -->
<div id="footer" style="position: relative; "></div>

</html>

<!-- Insert data into database -->
<?php
if (isset($_POST["Submit"])) {
    $contact_name = $_POST["contact_name"];
    $contact_email = $_POST["contact_email"];
    $message = $_POST["message"];
    $issues = $_POST["issues"];
    include("conn.php");
    $sql = "INSERT INTO message (Name, Email, Issue, Message)
        VALUES
        ('$_POST[contact_name]','$_POST[contact_email]', '$_POST[issues]', '$_POST[message]')";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    } else {
        echo '<script>alert("Message has been sent!");
        javascript:history.go(-1);
        </script>';
    }
    mysqli_close($con);
}
?>