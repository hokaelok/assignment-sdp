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
<div class="bg-[url('../image/terms-and-condition.jpeg')] bg-no-repeat bg-center h-[70%] bg-cover bg-fixed">
</div>
<div class="flex flex-col">
  <div class=" mt-24">
    <div class="flex flex-col mx-20 p-20 px-20 drop-shadow-lg w-[90%] bg-white">
      <h1 class="text-6xl font-['Verdana'] text-center font-bold">Terms & Condition</h1>
      <p class="text-2xl font-['Verdana'] text-sky-600">Your Remi education Account and Data.</p>
      <p class="text-lg font-['Verdana']">If you create an account on the Service, you are responsible for keeping your account and data secure,
        and you are entirely liable for all activities that occur under the account. Accounts are solely for personal,
        not organisational, usage by a single person. You are not permitted to share your account with anyone else.
        You must promptly alert Remi education of any unauthorised use of your data, account, or other security breaches.
        Remi education will not be accountable for your actions or omissions, including any damages suffered as a result of such actions or omissions.
        Remi education may, from time to time, impose storage restrictions on your data or take any other action it deems necessary to govern the Service.
        Remi edication may also modify its policy on supplying commercial material or showing advertising at any time and without notice. as a result of such acts or omissions.</p>
      <br>
      <p class="text-2xl font-['Verdana'] text-sky-600">Eligibility.</p>
      <p class="text-lg font-['Verdana']">Where banned, use of the Service is invalid.
        The Service is designed for users above the age of 13, however it is accessible to people of all ages.
        Remi education is recommended for parents/guardians to supervise the children who aged 13 and under (or other age of consent if needed by local legislation).</p>
      <br>
      <p class="text-2xl font-['Verdana'] text-sky-600">Prohibited Content.</p>
      <p class="text-lg font-['Verdana']">the Remi education is only allow instructional and study-related Content may be posted to the Service.
        The following are instances of Content that is not permitted to be posted on or via the Service.
        Remi education reserves the right to investigate and pursue appropriate legal action against anyone who,
        in Remi education sole discretion, violates this provision, including, but not limited to, removing the offending Content from the Service,
        terminating such violators' accounts, or seeking other legal remedies.</p>
      <br>
      <p class="text-2xl font-['Verdana'] text-sky-600">Prohibited Activities.</p>
      <p class="text-lg font-['Verdana']">While using the Service, you may only engage in educational and study-related activities.
        The following are some examples of forbidden activity on the Service.
        Quizlet reserves the right to investigate and take appropriate legal action against anyone who violates this provision in Quizlet's sole discretion,
        including without limitation, terminating your account and/or access to the Service, reporting you to appropriate governmental authorities, including law enforcement,
        or seeking other legal remedies.</p>
    </div>
  </div>
  <div class="top-0 bg-sky-500 w-full mt-20">

    <!-- Footer -->
    <?php
    include('common/footer.php');
    ?>
  </div>
</div>
</body>

</html>