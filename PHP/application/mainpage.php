<?php include("conn.php"); 
session_start()?>

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

		<!-- page title -->
		<!-- ## Wanna add logo for the title? -->
		<title>Remi Education - Students</title>

		<!-- render header & footer script -->
		<script>
			$(function () {
				$("#footer").load("common/footer.php");
			});
		</script>
	</head>

	<body>
		<!-- Header -->
		<?php
        include('common/users-header.php');
    	?>

		<!-- Student main content -->
		<div class="bg-blue-100 h-full relative">
			<div class="text-3xl font-semibold text-center py-8">
				What would you like to learn?
			</div>

			<div class="subject-card-container ">
			<!-- Selections -->

        <?php 
            //connect database
            include ("conn.php"); 
            //get data from database
            $mysql_run=mysqli_query($con, "SELECT * FROM topic ORDER BY Topic asc;");
            while ($row=mysqli_fetch_assoc($mysql_run)) {
                $Topic_ID=$row['Topic_ID'];
				$Topic=$row['Topic'];
				$Topic_Image=$row['Topic_Image'];
                $data ='
                <div class="subject-card">
					<div class="mb-5">
					<img src="data:image/jpg;base64,'.base64_encode($row['Topic_Image']).'" width="200px" height="160px"/>
						<span class="font-bold">'.$Topic.'</span>
					</div>
					<div class="flex flex-col gap-3 mb-2">
						<a href="article-selection.php?Topic_ID='.$Topic_ID.'"
							type="button"
							class="m-auto w-40 rounded-lg bg-blue-300 text-blue-800 hover:scale-110"
							>Article</a>
						<a href="tutorial-selection.php?Topic_ID='.$Topic_ID.'"
							type="button"
							class="m-auto w-40 rounded-lg bg-green-300 text-green-800 hover:scale-110"
							>Tutorial</a>
					</div>
				</div>
                ';

                //display data
                echo $data;

                } 
                mysqli_close($con);//to close the database connection
        ?>
        </div>
				</div>
				<!-- Can delete the things above juz for testing -->
			</div>
		</div>
	</body>
	<!-- Footer -->
	<div id="footer"></div>
</html>
