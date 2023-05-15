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
    }
}

// else if (isset($_SESSION["admin_email"])) {
// 	include('common/users-header.php');
//     $email = ($_SESSION["admin_email"]);
// 	$query = mysqli_query($con, "SELECT * FROM `mcq`");
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
			<h1 class="text-4xl mt-5">Select the question you wish to modify</h1>
			<div id="questionT">

			</div>
			<div class="pt-10">
				<button type="submit" class="bg-rose-500 h-10 w-auto px-5 text-white rounded-md ml-2"> Select </button>
			</div>
		</form>
		<button onclick="showAddQuest()" class="bg-rose-500 h-10 w-auto px-5 text-white rounded-md ml-2"> Add questions </button>
	</div>
	<div class="hidden flex justify-center items-center" id="editQuizContainer">
		<div class="flex flex-col">
		<button class="bg-sky-500 h-10 w-[10rem] px-5 -mt-5 text-white rounded-md ml-2 flex justify-center items-center" onclick="backSelect()">back to list</button>
		<h1 class="text-center font-bold text-5xl py-10">Selected question: </h1>
			<div id="displaySelectedQuestions" class="">
				<!-- display the selected question  -->
			</div>
			<form class="flex flex-col ml-20" method="POST" id="createMCQ" onsubmit="addQuest()" action="">
				<label class="text-2xl pt-5">Edit question</label>
				<input type='text' required class="text-xl w-[50rem] p-2 h-[3rem]" id="ques">
				<label class="text-2xl pt-5">Edit Option a</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="op-1">
				<label class="text-2xl pt-5">Edit Option b</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="op-2">
				<label class="text-2xl pt-5">Edit Option c</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]"id="op-3">
				<label class="text-2xl pt-5">Edit Option d</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="op-4">
				<label class="text-2xl pt-5">Edit Correct Ans (example c)</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="ans">
				<div class="pt-5">
					<button type="submit" value="Submit" id="add" class="h-[5rem] w-auto text-white bg-rose-500 px-10 ml-3 rounded-md">Edit</button>
				</div>
			</form>
		</div>
	</div>


	<div class="hidden flex justify-center items-center" id="addQuizContainer">
		<div class="flex flex-col">
		<button class="bg-sky-500 h-10 w-[10rem] px-5 -mt-5 text-white rounded-md ml-2 flex justify-center items-center" onclick="backSelect()">back to list</button>
		<h1 class="text-center font-bold text-5xl py-10">Add additional question: </h1>
			<form class="flex flex-col ml-20" method="POST" id="addMCQ" onsubmit="addMoreQuest()" action="">
				<label class="text-2xl pt-5">question</label>
				<input type='text' required class="text-xl w-[50rem] p-2 h-[3rem]" id="aques">
				<label class="text-2xl pt-5">Option a</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="aop-1">
				<label class="text-2xl pt-5">Option b</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="aop-2">
				<label class="text-2xl pt-5">Option c</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]"id="aop-3">
				<label class="text-2xl pt-5">Option d</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="aop-4">
				<label class="text-2xl pt-5">Correct Ans (example c)</label>
				<input type='text' required class="text-xl w-[30rem] p-2 h-[3rem]" id="aans">
				<div class="pt-5">
					<button type="submit" value="Submit" id="add" class="h-[5rem] text-white bg-rose-500 px-10 ml-3 rounded-md">Add</button>
				</div>
			</form>
		</div>
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
			document.getElementById("addQuizContainer").classList.add("hidden");
		}

		function selectQuestion() {
			var radios = document.getElementsByName('q');
			document.getElementById("displayQuizContainer").classList.add("hidden");
			var condition = []
			for (var i = 0, length = radios.length; i < length; i++) {
				// grab checked radios
				if (radios[i].checked) {
					var questno = (radios[i].value); //grab their values
					var uid = document.getElementById("mcqID").innerHTML; //grab the uid
					document.getElementById("displaySelectedQuestions").innerHTML ="" // reset display
					var displayEditForm = document.getElementById("editQuizContainer").classList.remove("hidden") // display edit container
					var jsonData = JSON.parse(document.getElementById(uid).innerHTML) // parse the json data
					questList = jsonData["questions"] // grab the questions
					// display the selected question
					for (let i = 0; i < data["questions"].length; i++) {
						var q = (quest[i]).questions
						if (i == questno-1) { // js is index of 0, so require -1 for indexing
							var question = q.question
							var ans = q.correctAnswer
							var att = q.answers
							document.getElementById("displaySelectedQuestions").innerHTML +='&nbsp<strong>' + (i+1) + ':&nbsp&nbsp&nbsp' + question + '</strong><br>';
							document.getElementById("displaySelectedQuestions").innerHTML += '&nbsp&nbsp&nbsp&nbsp(a): ' + att.a + '&nbsp&nbsp&nbsp&nbsp(b): ' + att.b + '&nbsp&nbsp&nbsp&nbsp(c): ' + att.c + '&nbsp&nbsp&nbsp&nbsp(d): ' + att.d
							document.getElementById("displaySelectedQuestions").innerHTML +='<br> Correct Answer: <strong>' + ans + '</strong><br>';
							document.getElementById("displaySelectedQuestions").innerHTML +='<p class="hidden" id="indexer">'+ (i) +'</p>'; // selected index

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

		function showAddQuest() {
			document.getElementById("addQuizContainer").classList.remove("hidden")
			document.getElementById("displayQuizContainer").classList.add("hidden")
		}

		function addQuest() {
			event.preventDefault();
			console.log("submitted")
			questionsData = []
			var uid = document.getElementById("mcqID").innerHTML;
			var jsonData = [JSON.parse(document.getElementById(uid).innerHTML)]
			console.log(jsonData)
			var quest = document.getElementById("ques").value
			var ans = document.getElementById("ans").value
			var op1 = document.getElementById("op-1").value
			var op2 = document.getElementById("op-2").value
			var op3 = document.getElementById("op-3").value
			var op4 = document.getElementById("op-4").value
			var indexer = document.getElementById("indexer").innerHTML
			var newJsonData = ({
				"questions": 
				{
					"question": quest,
					"answers" : {
						"a": op1,
						"b": op2,
						"c": op3,
						"d": op4
					},
					"correctAnswer": ans,
				},
			});
			for (let i=0; i<jsonData[0].questions.length; i++) {
				if (i != indexer ) {
					questionsData.push(jsonData[0].questions[i])
				}
				else if (i == indexer){
					questionsData.push(newJsonData)
				}
			}

			if (op1.length === 0 || op2.length === 0 || op3.length === 0 || op4.length === 0 || quest.length === 0 || ans.length === 0) {
				alert("please enter details")
			}
			else {
				var title = prompt("Please enter the title of your quiz, if you don't wish to rename it, leave it empty", "")
				var usname = jsonData[0]["created-by"];
				console.log(usname)
				if (title == "") {
					var JsonData = ({
					"mcq-uid": uid,
					"title": jsonData[0].title,
					"created-by": usname,
					'user-email': "<?php print $email ?>",
					"questions": questionsData
				})
				}
				else {
					var JsonData = ({
					"mcq-uid": uid,
					"title": title,
					"created-by": usname,
					'user-email': "<?php print $email ?>",
					"questions": questionsData
				})
				}
				console.log(JsonData)
				window.location.href="teacher-modifymcqHandler.php?JsonData="+JSON.stringify(JsonData);
			}
		}

		function addMoreQuest() {
			console.log("submitted")
			event.preventDefault();
			questionsData = []
			var uid = document.getElementById("mcqID").innerHTML;
			var jsonData = [JSON.parse(document.getElementById(uid).innerHTML)]
			console.log(jsonData)
			var quest = document.getElementById("aques").value
			var ans = document.getElementById("aans").value
			var op1 = document.getElementById("aop-1").value
			var op2 = document.getElementById("aop-2").value
			var op3 = document.getElementById("aop-3").value
			var op4 = document.getElementById("aop-4").value
			var addData = ({
				"questions": 
				{
					"question": quest,
					"answers" : {
						"a": op1,
						"b": op2,
						"c": op3,
						"d": op4
					},
					"correctAnswer": ans,
				},
			});
			for (let i=0; i<jsonData[0].questions.length; i++) {
				questionsData.push(jsonData[0].questions[i])
			}
			questionsData.push(addData)
			console.log(questionsData)
			console.log("pass")

			if (op1.length === 0 || op2.length === 0 || op3.length === 0 || op4.length === 0 || quest.length === 0 || ans.length === 0) {
				alert("please enter details")
			}
			else {
				var usname = jsonData[0]["created-by"];
				console.log(usname)
					var JsonData = ({
					"mcq-uid": uid,
					"title": jsonData[0].title,
					"created-by": usname,
					'user-email': "<?php print $email ?>",
					"questions": questionsData
				})
				console.log(JsonData)
				console.log("pass")
				window.location.href="teacher-modifymcqHandler.php?JsonData="+JSON.stringify(JsonData);
			}
		}



		var form = document.getElementById("selectForm");
		var form2 = document.getElementById("createMCQ");
		var form3 = document.getElementById("addMCQ");
		
        function handleForm(event) {
            event.preventDefault();
        }
        form.addEventListener('submit', handleForm);
		form2.addEventListener('submit', handleForm);
		form3.addEventListener('submit', handleForm);
		

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