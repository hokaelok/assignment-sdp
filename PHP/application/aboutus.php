<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page Title -->
    <Title>Remi Education</Title> 

    <!-- common meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- stylesheet -->
    <link href="../application/css/style.css" rel="stylesheet" />

    <!-- css styling -->
    <style>
        .about-usbg {
            background-image: url(image/about-us.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 90%;
        }
    </style>
</head>  
<body>
    <!--Header-->
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
    <div class="about-usbg bg-fixed">
    </div>
        <div class="flex flex-col">
            <div class=" mt-24">
                <h1 class="text-6xl font-['Verdana'] text-center font-bold">About Us</h1>
                <div class="flex flex-col mt-10 mx-20 p-20 px-20 drop-shadow-lg w-[90%] bg-white">
                    <p class="text-2xl font-['Verdana']">Remi Education is a free educational platform. We want to empower everyone, including children, students and employees to unlock their full learning potential. 
                        Our platform makes it easy for any individuals to learn at anytime and everywhere. All it needs is a device that can connect to Internet.</p>
                <br/><br/>
                <h1 class="text-4xl font-['Verdana'] font-bold">Mission</h1>
                <br/>
                    <p class="text-2xl font-['Verdana']">Make Learning Awesome and help students practice and master whatever they are learning</p>
                <br/><br/>
                <h1 class="text-4xl font-['Verdana'] font-bold">Vision</h1>
                <br/>
                    <p class="text-2xl font-['Verdana']">To provide the highest level of service for our community through innovation, professionalism, and partnering.</p>
                </div>
            </div>
            <div class="top-0 bg-sky-500 w-full mt-20">
                <!--Footer-->
                <?php
                include('common/footer.php');
                ?>
            </div>
        </div>
</body>
</html>
