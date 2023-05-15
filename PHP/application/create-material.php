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
		<link href="../application/css/style.css" rel="stylesheet" />

		<!-- import jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- render header script -->
		<script>
			$(function () {
				$("#footer").load("common/footer.php");
			});
		</script>

		<!-- CSS -->
		<style>
			.test1 {
				border: 1px solid red;
			}
			.test2 {
				border: 1px solid blue;
			}
			.test3 {
				border: 1px solid green;
			}
			.test4 {
				border: 1px solid pink;
			}
		</style>
	</head>
	<body>
		<!-- Header -->
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
		<div class="p-8">
			<!-- Form  -->
			<form action="add-material.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="w-1/2 m-auto px-20 py-12 bg-blue-300 rounded-lg">

				<!-- Form Title -->
				<h1 class="text-4xl mb-8">Create New Material</h1>

                <!-- Request Material Type -->
                <label for="material_type" class="text-xl">Material Type</label>
                <select class="block mt-2 mb-6 w-[400px] h-10 rounded-md pl-4" name="material_type" required>
                    <option value="">Please Select Material Type</option>
                    <option value="Article">Article</option>
                    <option value="Tutorial">Tutorial</option>
                </select>
                                
                <!-- Request topic -->
                <label for="topic" class="text-xl"
                    >Topic</label
                >
                <input
                    class="block mt-2 mb-6 w-[400px] h-8 pl-4 rounded-md"
                    type="text"
                    placeholder="Topic"
                    name="topic"
                    required
                />

				<!-- Request Title Name -->
                <label for="material_title" class="text-xl"
                    >Material Title</label
                >
                <input
                    class="block mt-2 mb-6 w-[400px] h-8 pl-4 rounded-md"
                    type="text"
                    placeholder="Material Title"
                    name="material_title"
                    required
                />
				

				<!-- Request Author Name -->
                <label for="teacher-email" class="text-xl">Teacher Email</label>
                <input
                    class="block mt-2 mb-6 w-[400px] h-8 pl-4 rounded-md"
                    type="text"
                    placeholder=<?php echo "'$_SESSION[teacher_email]'"?>
                    name="teacher_email"
                />

				<!-- Request PDF Material -->
                <label for="pdf" class="text-xl"
                    >Upload Material (PDF MAX 400KB)</label
                >
                <input
                    class="block mt-2 mb-4"
                    type="file"
                    name="pdf"
                    accept=".pdf"
                    required
                />

				<!-- Submit Button -->
				<div class="mt-10">
					<button
						type="submit"
						name="Submit"
						class="bg-white w-32 h-8 rounded-xl hover:shadow-lg hover:-translate-y-1 transition-all"
					>
						Submit
					</button>
				</div>
			</form>
		</div>
	</body>

	<!-- Footer -->
	<div id="footer" style="position: relative"></div>
</html>
<!-- Insert data into database -->
<?php
if (isset($_POST["Submit"])) {
    $material_type = $_POST["material_type"];
    $material_title = $_POST["material_title"];
    $teacher_email = $_SESSION["teacher_email"];
    $topic = $_POST["topic"];
    $PDFFile=$_FILES['pdf']['tmp_name'];
}
?>
?>