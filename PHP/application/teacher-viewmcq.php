<?php 
session_start();
include('conn.php');
$TEmail = ($_SESSION["teacher_email"]);
if (isset($_SESSION["student_email"])) {
    echo "you do not have permission to access this session";
    exit();
}
else if (isset($_SESSION["teacher_email"])) {
	include('common/users-header.php');
	$TEmail = ($_SESSION["teacher_email"]);
    $query = mysqli_query($con, "SELECT * FROM `mcq` WHERE Teacher_Email='$TEmail'");
    while ($row = mysqli_fetch_array($query)){
        $uuid = $row["mcqUID"];
        $data = $row["mcqData"] ;
		$dataDecode = json_decode($row["mcqData"], true);
		$title = $dataDecode["title"];
    }
}

// else if (isset($_SESSION["admin_email"])) {
// 	include('common/users-header.php');
//     $Admail = ($_SESSION["teacher_email"]);
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
    </head>
    <body>
	<?php 
		$query = mysqli_query($con, "SELECT * FROM `mcq` WHERE Teacher_Email='$TEmail'");
		while ($row = mysqli_fetch_array($query)){
			$uuid = $row["mcqUID"];
			$data = $row["mcqData"];
			echo "<p id=\"$uuid\" class=\"hidden\">$data</p>";
		}
	?>
    <div class="mt-5">
        <button class="bg-sky-500 h-10 w-[7rem] text-white rounded-md ml-2"><a href="teacher-mcqmain.php">Back</a></button>
    </div>
	<div id="displayQuizList">
	<h1 class="text-center font-bold text-5xl">Your quizzes</h1>
	<div class="flex justify-center items-center">
		<div class="grid grid-rows-2 grid-cols-4 grid-flow-row gap-10 mt-10" id="displayQuiz">
		<?php 
				$query = mysqli_query($con, "SELECT * FROM `mcq` WHERE Teacher_Email='$TEmail'");
				while ($row = mysqli_fetch_array($query)){
					$uuid = $row["mcqUID"];
					$dataDecode = json_decode($row["mcqData"], true);
					$title = $dataDecode["title"];
					echo "
					<button 
					class='bg-rose-500 h-10 w-auto px-5 text-white rounded-md ml-2' 
					onclick=\"readMCQ('$uuid')\"
					>$title
					</button>";
				}
				?>
		<!-- <button class="bg-rose-500 h-10 w-auto px-5 text-white rounded-md ml-2" onclick="readMCQ('fed97e07-0bf5-44ca-a7ee-b52fdd35c621')">grammar quiz</button> -->
		<!-- <button class="bg-rose-500 h-10 w-[7rem] text-white rounded-md ml-2"></button> -->
	</div>
	</div>

	</div>
	
    <div id="displayQuizContainer" class="flex justify-center items-center flex flex-col hidden">
	<button class="bg-sky-500 h-10 w-auto px-5 -mt-5 text-white rounded-md ml-2" onclick="backMCQ()">view other quiz</button>
        <div id="quiz" class="flex flex-col px-10 mt-5"></div>
        <button id="submit" class="bg-sky-500 h-10 w-auto px-5 mt-5 text-white rounded-md ">Submit Quiz</button>
        <div id="results"></div>
    </div>
	<div class="mt-[35rem]">
		<?php include("common/footer.php"); ?>
	</div>
    </body>
	<script src="./js/readmcq.js"></script>
</html>