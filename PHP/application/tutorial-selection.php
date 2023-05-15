<?php include("conn.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Page Title -->
		<title>Remi Education</title>

		<!-- common meta tags -->
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- stylesheet links -->
		<link href="../style.css" rel="stylesheet" />
		<link href="../application/css/style.css" rel="stylesheet" />

		<!-- import icon -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
		/>

		<!-- import jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- render header & footer script -->
		<script>
			$(function () {
				$("#footer").load("common/footer.php");
			});
		</script>

		<!-- CSS style -->
		<style></style>
	</head>
	<body>
		<!-- Header -->
		<?php
		session_start();
        include('common/users-header.php');
        ?>

		<!-- main content -->
		<div class="bg-blue-100 h-full relative">
		<div class="text-3xl font-semibold text-center py-8 mb-5">
		<?php 
            //connect database
            include ("conn.php"); 
			$Topic_ID = $_GET["Topic_ID"];
			//get data from database
			$topic=mysqli_query($con, "SELECT * FROM topic WHERE Topic_ID='$Topic_ID';");
            while ($row=mysqli_fetch_assoc($topic)) {
				$Topic = $row["Topic"];
			echo "$Topic";
			?>
			</div>			
			<div class="subject-card-container">
			<!-- Selections -->
			
			<?php
			include ("conn.php"); 
            $mysql_run=mysqli_query($con, "SELECT * FROM tutorial WHERE Topic_ID='$Topic_ID' AND Category='Tutorial';");
            while ($row=mysqli_fetch_assoc($mysql_run)) {
                $Tutorial_ID=$row['Tutorial_ID'];
				$Tutorial_Name=$row['Tutorial_Name'];
				$data = '
				<a href="#">
					<div class="subject-card">
						<div class="p-3">
						<a href="tutorial.php?Tutorial_ID='.$Tutorial_ID.'">
							<span class="font-bold">'.$Tutorial_Name.'</span>
						</div>
					</div>
				</a>
			'; 
			//display data
			echo $data; 
			}
			} 
			mysqli_close($con);
			//to close the database connection 
		?>
				
			</div>
		</div>
	</body>

	<!-- Footer -->
	<div id="footer"></div>
</html>
