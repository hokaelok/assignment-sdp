<?php include("conn.php"); 
session_start();
if (isset($_SESSION["student_email"])) {
    echo "you do not have permission to access this session";
    exit();
}
else if (isset($_SESSION["teacher_email"])) {
    include('common/users-header.php');
	$TEmail = ($_SESSION["teacher_email"]);

}

else if (isset($_SESSION["admin_email"])) {
    include('common/users-header.php');
}


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
		<title>Remi Education - View MCQ</title>

		<!-- render header & footer script -->
		<script>
			$(function () {
				$("#footer").load("common/footer.php");
			});
		</script>
    </head>
    <body>
	<script type="text/javascript" src="./js/submitNewMCQ.js"></script>
    <div class="mt-5">
        <button class="bg-sky-500 h-10 w-[7rem] text-white rounded-md ml-2"><a href="teacher-mcqmain.php">Back</a></button>
    </div>
	<div class="flex flex-row mt-10 px-[5rem]">
		<div class="flex flex-col">
			<form class="flex flex-col ml-20" method="POST" id="createMCQ" onsubmit="return createSubmit(email)" action="teacher-createmcqHandler.php">
				<label class="text-2xl pt-5">Question</label>
				<input type='text' required class="text-xl w-[50rem] p-2 h-[3rem]" id="ques">
				<label class="text-2xl pt-5">Option a</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="op-1">
				<label class="text-2xl pt-5">Option b</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="op-2">
				<label class="text-2xl pt-5">Option c</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]"id="op-3">
				<label class="text-2xl pt-5">Option d</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="op-4">
				<label class="text-2xl pt-5">Correct Ans (example c)</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="ans">
				<div class="pt-5">
					<button type="submit" value="Submit" id="add" class="h-[5rem] text-white bg-rose-500 px-10 ml-3 rounded-md">Submit</button>
					<button type="submit" value="Submit" id="morequest" class="h-[5rem] text-white bg-rose-500 px-10 ml-3 rounded-md" onclick="return addQuest()">Add more questions</button>
				</div>
			</form>
			
			<script>
                var form = document.getElementById("createMCQ");

                function handleForm(event) {
                    event.preventDefault();
                }
                form.addEventListener('submit', handleForm);

				email = '<?php echo $TEmail ;?>';
            </script>
			<br><br>
		</div>
	</div>
	<?php include("common/footer.php"); ?>
    </body>
</html>