<!DOCTYPE html>
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

		<!-- render header script -->
		<script>
			$(function () {
				$("#footer").load("common/footer.php");
			});
		</script>

		<!-- css styling -->
		<style>
			html,body{
				height: 100%;
				width: 100%;
				place-items: center;
				font-family:Verdana;
			}

			th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: left;
				background-color:#516166 ;
				color: white;
				text-align: center;
				width: 10%;
			}

			table, td, th {
				border: 1px solid black;
				text-align: center;
				font-family:Verdana;
				font-size:20px;
			}
				
			table {
				border-collapse: collapse;
				width: 100%;
			}

			.wrapper{
				overflow:hidden;
				background: #fff;
				padding: 30px;
				border-radius: 5px;
				box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
				top:20%;
				left:10%;
				margin: 150px auto 40rem auto;
				height: auto;
				width: 80%;
				/* height120px;width:120px;border:1px solid #ccc;overflow:auto; */
			}

			.tab {
				overflow: hidden;
				border: 1px solid #ccc;
				background-color: #f1f1f1;
			}
			
			/* Style the buttons inside the tab */
			.tab button {
				background-color: inherit;
				float: left;
				border: none;
				outline: none;
				cursor: pointer;
				padding: 14px 16px;
				transition: 0.3s;
				font-size: bold 10px;
			}

			/* Change background color of buttons on hover */
			.tab button:hover {
				background-color: #ddd;
			}
			
			/* Create an active/current tablink class */
			.tab button.active {
				background-color: #ccc;
			}
			
			/* Style the tab content */
			.tabcontent {
				display: none;
				padding: 16px 12px;
				border: 1px solid #ccc;
				border-top: none;
				text-align: left;
			}

			.addBTN {
				width: auto;
				height: 50px;
				margin-left:70%;
				color:rgb(134, 189, 220);
				font-size: 20px;
			}

			.addBTN:hover {
				cursor: pointer;
				color:rgb(76, 143, 220);
				border-radius: 15px;
				transition: background-color 0.5s ease-in; 
			}

			.subjectBTN {
				width: 150px;
				height: 40px;
				text-align: center;
				color:rgb(254, 150, 137);
				
			}

			.subjectBTN:hover {
				cursor: pointer;
				background-color: rgb(254, 150, 137);
				color:white;
				border-radius: 15px;
				transition: background-color 0.5s ease-in; 
			}

		</style>
	</head>
	<body>
		<!-- Header -->
		
        <?php 
		include('conn.php');
		session_start();
		include 'common/users-header.php'; ?>
        
		<!-- Main Content -->
		<div class="wrapper">
			<?php
			if(isset($_SESSION["admin_email"])){
			$Teacher_Email=$_GET['Teacher_Email'];
			$sql = mysqli_query($con, "SELECT * FROM teacher where Teacher_Email = '$Teacher_Email'");
				while($row = mysqli_fetch_array($sql)) {
					$Teacher_Name = $row['Teacher_Name'];
			echo'
			<h1 class="text-3xl font-["Verdana"]">'.$Teacher_Email.'</h1><br>
			<h1 class="text-3xl font-["Verdana"]">'.$Teacher_Name.'</h1><br>';}}
			?>
			<h1 class="text-5xl font-['Verdana'] text-center font-bold">Material Created</h1><br>
			<div class="tab">
			<button class="tablinks" onclick="petAdvice(event, 'Tutorial')" id="defaultOpen">Tutorial</button>
			<button class="tablinks" onclick="petAdvice(event, 'Article')">Article</button>
			<?php
			if(isset($_SESSION["teacher_email"])){
			$Teacher_Email=$_SESSION["teacher_email"];
			$data="
			<a href='create-material.php'>
			<button class='addBTN' onclick='addTutorial'>Create New Material</button></a>";
			echo $data;	}	
			?>
			</div>
			<div id="Tutorial" class="tabcontent">
			<br><br>
			<table>
				<tr>
					<th>Suject</th>
					<th>Tutorial Name</th>
					<?php
						if(isset($_SESSION["teacher_email"])){
						echo'<th>Modify</th>
						<th>Delete</th>';}?>
				</tr>
				<tr>
				<?php
					//get topic info from topic table
					$sql = mysqli_query($con, "SELECT * FROM tutorial where Teacher_Email = '$Teacher_Email' AND Category='Tutorial'");
					while($row = mysqli_fetch_array($sql)) {
						$Tutorial_ID = $row['Tutorial_ID'];
						$Topic_ID = $row['Topic_ID'];
						$Tutorial_Name = $row['Tutorial_Name'];
						$topic = mysqli_query($con, "SELECT * FROM topic WHERE Topic_ID = '$Topic_ID';");
						while ($row = mysqli_fetch_assoc($topic)) {
							$Topic = $row['Topic'];
					
					// display table
					echo"
					<tr>
						<td>$Topic</td>
						<td><a href='tutorial.php?Tutorial_ID=".$Tutorial_ID."'>$Tutorial_Name</a></td>";
						
					if(isset($_SESSION["teacher_email"])){
						echo"
						<td><a href='modify-material.php?Tutorial_ID=".$Tutorial_ID."'>
						<button class='subjectBTN' onclick='subject'>Modify</button></a></td>
						<td><a href='delete-tutorial.php?Tutorial_ID=".$Tutorial_ID."'>
						<button class='subjectBTN' onclick='subject'>Delete</button></a></td>
						</tr>";
					}
					}
					}
				?>
				</tr>
			</table>
		</div>
		<div id="Article" class="tabcontent">
			<br><br>
			<table>
				<tr>
					<th>Suject</th>
					<th>Tutorial Name</th>
					<?php
						if(isset($_SESSION["teacher_email"])){
						echo'<th>Modify</th>
						<th>Delete</th>';}?>
				</tr>
				<tr>
				<?php
					//get topic info from topic table
					$sql = mysqli_query($con, "SELECT * FROM tutorial where Teacher_Email = '$Teacher_Email' AND Category='Article' ");
					while($row = mysqli_fetch_array($sql)) {
						$Tutorial_ID = $row['Tutorial_ID'];
						$Topic_ID = $row['Topic_ID'];
						$Tutorial_Name = $row['Tutorial_Name'];
						$topic = mysqli_query($con, "SELECT * FROM topic WHERE Topic_ID = '$Topic_ID';");
						while ($row = mysqli_fetch_assoc($topic)) {
							$Topic = $row['Topic'];
					
					// display table
					echo"
					<tr>
						<td>$Topic</td>
						<td><a href='tutorial.php?Tutorial_ID=".$Tutorial_ID."'>$Tutorial_Name</a></td>";
						
					if(isset($_SESSION["teacher_email"])){
						echo"
						<td><a href='modify-material.php?Tutorial_ID=".$Tutorial_ID."'>
						<button class='subjectBTN' onclick='subject'>Modify</button></a></td>
						<td><a href='delete-tutorial.php?Tutorial_ID=".$Tutorial_ID."'>
						<button class='subjectBTN' onclick='subject'>Delete</button></a></td>
						</tr>";
					}
					}
					}
				?>
				</tr>
			</table>
		</div>
		</div>
		<script>
        function petAdvice(event, pettype) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(pettype).style.display = "block";
        event.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
<!-- Footer -->
<div id="footer" style="position: relative; margin-top: 20px;"></div>
	</body>
</html>
