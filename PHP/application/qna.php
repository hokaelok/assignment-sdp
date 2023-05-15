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
<div class="flex flex-col">
    <div class=" mt-24">
        <h1 class="text-6xl font-['Verdana'] text-center font-bold">Questions and Answers</h1>
        <div class="flex flex-col mt-10 mx-20 p-20 px-20 drop-shadow-lg w-[90%] bg-white">
            <p class="text-2xl font-['Verdana'] text-sky-600">Is Remi education free?</p>
            <p class="text-lg font-['Verdana']">Learning on Remi education is completely free without any charges.</p>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600">Does the platform meet a child’s unique needs?</p>
            <p class="text-lg font-['Verdana']">Some kids are visual learners. Others are kinesthetic learners and need to touch and move to learn. 
                Parents should take into account how their child learns when determining what platform might work best for them. 
                “Sometimes platforms only serve one type of learner,” Anderson said. 
                “Or they use particular sequencing that might be difficult developmentally for a child.”</p>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600"> What Is Remi Education?</p>
            <p class="text-lg font-['Verdana']">Remi Education is a free educational platform. We want to empower everyone, including children, 
                students and employees to unlock their full learning potential. 
                Our platform makes it easy for any individuals to learn at anytime and everywhere. All it needs is a device that can connect to Internet.</p>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600"> Do Games Really Help You Learn?</p>
            <p class="text-lg font-['Verdana']">That depends upon how well the game is designed. If you are using games merely as a wrapper – for instance hitting a football goal, 
                each time the learner correctly answers an assessment question on compliance, then you are obviously not teaching anything. 
                However, if you explain a specific concept through a game, then you are disseminating learning. But again, 
                this depends upon how well you have designed the game. The best learning games teach in the same way good teachers teach. 
                They are not merely wrappers for pseudo-engagement; rather they help learners find genuine excitement in learning, and help in learning a topic.</p>
        </div>
    </div>
    <div class="top-0 bg-sky-500 w-full mt-20">

        <!-- fOOTER -->
        <?php
        include('common/footer.php');
        ?>
    </div>
</div>

</body>

</html>