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
<div class="bg-[url('../image/privacy.jpg')] bg-no-repeat bg-center h-[70%] bg-cover bg-fixed">
</div>
<div class="flex flex-col">
    <div class=" mt-16">
        <h1 class="text-4xl font-['Verdana'] text-center font-bold">Privacy-Policy</h1>
        <div class="flex flex-col mt-10 mx-20 p-20 px-20 drop-shadow-lg w-[90%] bg-white">
            <p class="text-2xl font-['Verdana'] text-sky-600">Accountability</p>
            <p class="text-lg font-['Verdana']">We will be responsible for all personal data collected.
                All personal data collected will be used and processed fairly and lawfully within our programs. We ensure all
                our user that we will be accountable for our organisations compliance to our Privacy Policy.</p>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600">Safeguards</p>
            <p class="text-lg font-['Verdana']">We ensure our customers that appropriate security safeguards are in place to
                protect personal data agaisnt unauthorized access, miuse, disclosure, copying , use , alteriatiom, accidental loss
                or theft , destruction or damage.</p>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600">Openness</p>
            <p class="text-lg font-['Verdana']">Our data protection policy (Privacy Policy) is displayed on the website and
                the policy is set out in the same language medium as the website. We encourage all our users to read
                our Privacy Policy to understand our objectives of collection their personal data.</p>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600">Prevent abuse and misuse of the Service</p>
            <p class="text-lg font-['Verdana']">We may use your Personal Information as is reasonably required to prevent against misuse or abuse of our Services, to protect the interests of our Users,
                to ensure compliance with our T&Cs and relevant legislation, and to seek any remedies.
                For example, we may monitor the content that our Users upload or display on a regular basis to verify that it complies with our T&Cs,
                including using automated screening systems. This benefits all Users who follow our Terms and Conditions since it eliminates abuse and allows us to maintain a functioning platform.
                We use your Personal Information for this purpose based on our legitimate interest in protecting the Service from abuse and misuse.</p>
            <br>
            <p class="text-2xl font-['Verdana'] text-sky-600">Data analytics</p>
            <p class="text-lg font-['Verdana']">Your Personal Information may be used to perform data analytics in reliance on our legitimate business interests in improving and enhancing our products and services for our Users.
                For example, we use analytics data to enable product recommendation, audience segmentation, and predicted demographics features for our Users.</p>
        </div>
    </div>
    <div class="top-0 bg-sky-500 w-full mt-20">
        <?php
        include('common/footer.php');
        ?>
    </div>
</div>
</body>

</html>