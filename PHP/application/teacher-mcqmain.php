<?php include("conn.php"); 
session_start();
if (isset($_SESSION["student_email"])) {
    echo "you do not have permission to access this session";
    exit();
}
else if (isset($_SESSION["teacher_email"])) {
// continue
}
// else if (isset($_SESSION["admin_email"])) {
// // continue
// }

else {
    echo "you do not have permission to access this session";
    exit();
}
?>
<html lang="en">
	<head>
		<!-- page title -->
		<title>Remi Education</title>

		<!-- common meta tags -->
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- stylesheet links -->
		<link href="../application/css/style.css" rel="stylesheet" />

		<!-- import jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- page title -->
		<!-- ## Wanna add logo for the title? -->
		<title>Remi Education - View MCQ</title>

		<!-- render header & footer script -->
		<script>
			$(function () {
				$("#footer").load("common/footer.php");
			});
		</script>
        <style>
            body{
	font-size: 20px;
	font-family: sans-serif;
	color: #333;
}
.question{
	font-weight: 600;
}
.answers {
  margin-bottom: 20px;
}
.answers label{
  display: block;
}
#submit{
	font-family: sans-serif;
	font-size: 20px;
	background-color: #279;
	color: #fff;
	border: 0px;
	border-radius: 3px;
	padding: 20px;
	cursor: pointer;
	margin-bottom: 20px;
}
#submit:hover{
	background-color: #38a;
}
        </style>
	</head>

	<body>

    <?php 
        include('common/users-header.php');
    ?>
    <div class="flex justify-center items-center mt-[10rem]">
		<div class=" grid grid-rows-2 grid-cols-2 gap-[10rem]">
		<button class="text-4xl bg-sky-500 p-2 w-[20rem] h-[10rem] mt-10 text-white rounded-md"><a href="teacher-createmcq.php" class="">Create new questions</a></button>
        <button class="text-4xl bg-sky-500 p-2 w-[20rem] h-[10rem] mt-10 text-white rounded-md"><a href="teacher-viewmcq.php" class="">View your questions</a></button>
        <button class="text-4xl bg-sky-500 p-2 w-[20rem] h-[10rem] mt-10 text-white rounded-md"><a href="teacher-modifymcq.php" class="">Modify questions</a></button>
        <button class="text-4xl bg-sky-500 p-2 w-[20rem] h-[10rem] mt-10 text-white rounded-md"><a href="teacher-delmcq.php" class="">Delete questions</a></button>
		<br><br>	
	</div>
    </div>  
	<div class="">
	<?php include("common/footer.php"); ?>
	</div>	
</body>
</html>