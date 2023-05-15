<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page Title -->
    <title>Create New Topic</title>

    <!-- Common Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- stylesheet -->
    <link href="../application/css/style.css" rel="stylesheet" />

<style>
.bookbg {
    background-image: url(image/books.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 50%;
}
.section {
        margin-bottom: 15px;
        width:100%;
        }

.label {
    text-align: left;
    margin-right: 10px;
    font-size:20px;
}

.field {
    width:100%;
}

#container {
    padding: 16px;
    background-color:#fff;
    width:800px;
    margin:0 auto;
}

input[type=text], input[type=file], input[type=email]{
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    font-size:15pt;
    border: 1px solid;
}

input[type=text]:focus {
        background-color: #ddd;
        outline: none;
}
</style>

</head>
<body>
<!-- Header -->
<?php
session_start();
if (isset($_SESSION["admin_email"])) {
    include('common/users-header.php');
}
?>
<!-- Main Content Area -->
<div class="bookbg bg-fixed">
</div>
<div class="flex flex-col">
    <div class="mt-24">
        <h1 class="text-6xl font-['Verdana'] text-center font-bold">Create New Topic</h1>
        <br>
            <form action="#" method="POST" enctype="multipart/form-data"> 
            <div id="container">
                <div class="section">
                    <div class="label">
                        Topic Name
                    </div>
                    <div class="field">
                        <input type="text" name="topic" placeholder="Topic Name" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        Upload Image
                    </div>
                    <div class="field">
                        <input type="file" name="IMG" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        Teacher Email
                    </div>
                    <div class="field">
                        <input type="email" name="teacher_email" placeholder="Teacher Email" required>
                    </div>
                </div>
                <button type="reset" name="resetBtn" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Reset
                </button>
                <button type="submit" name="submitBtn" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    Submit
                </button>
            </div>
            </form>
        <div class="top-0 bg-sky-500 w-full mt-20"> 
            <!-- Footer -->
            <?php
            include('common/footer.php');
            ?> 
        </div>
    </div>
</div>
</body>
</html>

<!-- Insert data into database -->
<?php
if (isset($_POST["submitBtn"])) {
    $topic = $_POST["topic"];
    $IMG=$_FILES['IMG']['tmp_name'];
    $teacher_email = $_POST["teacher_email"];
    include("conn.php");
    $img = file_get_contents($IMG);
    $result=mysqli_query($con,"SELECT * FROM topic WHERE topic='$topic' GROUP BY NOT NULL");
    $teacher=mysqli_query($con,"SELECT * FROM teacher WHERE Teacher_Email='$teacher_email' GROUP BY NOT NULL");
    //check whether data exist in database
    if(mysqli_num_rows($result)==1){
        echo "<script>
        alert('Topic exists.');
        javascript:history.go(-1);
        </script>";
        mysqli_close($con);
    }
    else if(mysqli_num_rows($teacher)==1)
    //if data not exist then insert data into database
    {
    $sql = "INSERT INTO topic (Topic, Teacher_Email, Topic_Image)
        VALUES
        ('$_POST[topic]', '$_POST[teacher_email]', ?)";
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,"s",$img);
        mysqli_stmt_execute($stmt);
        $check = mysqli_stmt_affected_rows($stmt);
        if (mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        } 
        else {
            echo "<script>
            alert('Topic has been added!');
            javascript:history.go(-1);
            </script>";
        }
    }
    else{
        echo "<script>
        alert('Teacher not exists.');
        javascript:history.go(-1);
        </script>";
    }
    mysqli_close($con);
}
?>