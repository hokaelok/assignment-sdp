<?php 
session_start();
include('conn.php');
if (isset($_SESSION["student_email"])) {
    echo "you do not have permission to access this session";
    exit();
}
else if (isset($_SESSION["teacher_email"])) {
	include('common/users-header.php');
	$GLOBALS['email'] = ($_SESSION["teacher_email"]);
    $query = mysqli_query($con, "SELECT * FROM `mcq` WHERE Teacher_Email='$email'");
    while ($row = mysqli_fetch_array($query)){
        $GLOBALS['uuid'] = $row["mcqUID"];
        $data = $row["mcqData"] ;
		$dataDecode = json_decode($row["mcqData"], true);
		$title = $dataDecode["title"];
		$Temail = $dataDecode["user-email"];
    }
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
		$query = mysqli_query($con, "SELECT * FROM `mcq` WHERE Teacher_Email='$email'");
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
				$query = mysqli_query($con, "SELECT * FROM `mcq` WHERE Teacher_Email='$email'");
				while ($row = mysqli_fetch_array($query)){
					$uuid = $row["mcqUID"];
					$dataDecode = json_decode($row["mcqData"], true);
					$title = $dataDecode["title"];
					echo "<button class='bg-rose-500 h-10 w-auto px-5 text-white rounded-md ml-2' onclick=\"selectMCQ('$uuid')\">$title</button>";
				}
				?>
			<!-- <button class="bg-rose-500 h-10 w-[7rem] text-white rounded-md ml-2"></button> -->
			</div>
	</div>
	</div>
	<div class="flex flex-col justify-center items-center hidden" id="displayQuizContainer">
		<button class="bg-sky-500 h-10 w-auto px-5 -mt-5 text-white rounded-md ml-2" onclick="backMCQ()">view other quiz</button>
		<form class="flex flex-col" onsubmit="return selectQuestion()" id="selectForm">
			<h1 class="text-4xl mt-5">Select the question you wish to delete</h1>
			<div id="questionT">

			</div>
			<div class="pt-10">
				<button type="submit" class="bg-rose-500 h-10 w-auto px-5 text-white rounded-md ml-2" onclick=""> Select </button>
			</div>
		</form>
	</div>
	<div class="mt-[50rem]">
	<?php include("common/footer.php"); ?>
	</div>	
    </body>
	<script>
		function selectMCQ(uid) {
			var mcqID = document.getElementById(uid).innerHTML;
			data = JSON.parse(mcqID);
			console.log(data);
			title = data["title"];
			quest = data["questions"]
			console.log(quest);
			document.getElementById("questionT").innerHTML =""
			document.getElementById("questionT").innerHTML += '<p class="hidden" id="mcqID">'+ uid +'</p>'
			for (let i = 0; i < data["questions"].length; i++) {
				var q = (quest[i]).questions
				var question = q.question
				var ans = q.correctAnswer
				var att = q.answers
				document.getElementById("questionT").innerHTML +='<br><input type="radio" value="'+ (i+1) + '" name="q">'
				document.getElementById("questionT").innerHTML +='&nbsp<strong>' + (i+1) + ':&nbsp&nbsp&nbsp' + question + '</strong><br>';
				document.getElementById("questionT").innerHTML += '&nbsp&nbsp&nbsp&nbsp(a): ' + att.a + '&nbsp&nbsp&nbsp&nbsp(b): ' + att.b + '&nbsp&nbsp&nbsp&nbsp(c): ' + att.c + '&nbsp&nbsp&nbsp&nbsp(d): ' + att.d
				document.getElementById("questionT").innerHTML +='<br> Correct Answer: <strong>' + ans + '</strong><br>';
			}
			document.getElementById("displayQuizList").classList.add("hidden");
			document.getElementById("displayQuizContainer").classList.remove("hidden");
		}

		function backMCQ() {
		document.getElementById("displayQuizList").classList.remove("hidden");
		document.getElementById("displayQuizContainer").classList.add("hidden");
		}

		function backSelect() {
			document.getElementById("displayQuizContainer").classList.remove("hidden");
			document.getElementById("editQuizContainer").classList.add("hidden");
		}

		function selectQuestion() {
			var radios = document.getElementsByName('q');
			var condition = []
			for (var i = 0, length = radios.length; i < length; i++) {
				if (radios[i].checked) {
					var questno = (radios[i].value);
					var uid = document.getElementById("mcqID").innerHTML;
					document.getElementById("displayQuizContainer").innerHTML = '' // reset display
					var jsonData = JSON.parse(document.getElementById(uid).innerHTML)
					questList = jsonData["questions"]
					// display the seletec question
					for (let i = 0; i < data["questions"].length; i++) {
						var q = (quest[i]).questions
						if (i == questno-1) { // js is index of 0, so require -1 for indexing
							var question = q.question
							var ans = q.correctAnswer
							var att = q.answers
							// delete question here
							document.getElementById("displayQuizContainer").innerHTML +='<p class="hidden" id="indexer">'+ i +'</p>'
							if (confirm('Are you sure you want to delete this')) {
								// execute
								removeQuest(uid)
							}
							else {

							}
						}
					}
					condition.push("pass")
					break;
				}
			}
			if (condition.length == 0) {
				alert("Please select a question to edit")
				backSelect()
			}
		}

		function removeQuest(uuid) {
			event.preventDefault();
			questionsData = []
			var jsonData = [JSON.parse(document.getElementById(uuid).innerHTML)]
			var indexer = document.getElementById("indexer").innerHTML
			// refactor this to delete
			for (let i=0; i<jsonData[0].questions.length; i++) {
				if (i != indexer ) {
					questionsData.push(jsonData[0].questions[i])
				}
				else if (i == indexer){
					continue // don't push the selected delete to the table
				}
			}
			// if there are still questions (teachers)

				if (questionsData.length > 0 ) {
					console.log("admin ver")
					var usname = jsonData[0]["created-by"];
					console.log(usname)
					var JsonData = ({
					"mcq-uid": uuid,
					"title": title,
					"created-by": usname,
					'user-email': "<?php print $email ?>",
					"questions": questionsData
					})

				window.location.href="teacher-modifymcqHandler.php?JsonData="+JSON.stringify(JsonData);
				}
				else {
					// if there are no more questions, delete entire quiz
					if (confirm('There are no more questions left in the quiz, contuinuing will delete, the data, are you sure?')) {
						var mcqUID =uuid;
						console.log(mcqUID);
						window.location.href="teacher-delmcqHandler.php?mcqID="+mcqUID;
					}
				}
		}

		var form = document.getElementById("selectForm");
		
        function handleForm(event) {
            event.preventDefault();
        }
        form.addEventListener('submit', handleForm);
		

		function findAndReplace(object, value, replacevalue){
			for(var x in object){
				if(typeof object[x] == typeof {}){
				findAndReplace(object[x], value, replacevalue);
				}
				if(object[x] == value){ 
				object["questions"] = replacevalue;
				// break; // uncomment to stop after first replacement
				}
			}
		}
	</script>
</html>