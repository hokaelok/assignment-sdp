<?php
include "conn.php";
?>

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
		<?php 

			$Tutorial_ID = $_GET['Tutorial_ID'];
			$sql = mysqli_query($con, "SELECT * FROM tutorial WHERE Tutorial_ID = '$Tutorial_ID'");
			while ($row = mysqli_fetch_array($sql)){

		?>

		<div class="p-8 mt-10">
			<!-- Form -->
			<form
				action="edit-material.php"
				method="POST" accept-charset="utf-8" enctype="multipart/form-data"
				class="w-1/2 m-auto px-20 py-12 bg-blue-300 rounded-lg"
			>
				<!-- Form Title -->
				<h1 class="text-4xl mb-8">Edit Material</h1>
				<input class="hidden" type="text" value="<?php echo "$Tutorial_ID"?>" name="Tutorial_ID"/>
				<!-- Request Material Type -->
				<label for="material_type" class="text-xl">Material Type</label>
				<div
					class="border-2 border-white w-[400px] h-7 pl-4 rounded-md mb-4 bg-white"
				>
					<?php print $row['Category'] ?>
				</div>

				<!-- Request Title Name -->
				<label for="material_title" class="text-xl"
					>Material Title</label
				>
				<input
					class="block mt-2 mb-6 w-[400px] h-8 pl-4 rounded-md"
					type="text"
					placeholder="<?php print $row['Tutorial_Name'] ?>"
					name="material_title"
				/>

				<!-- Request Teacher Name -->
				<label for="teacher_email" class="text-xl">Teacher Email</label>
				<div class='border-2 border-white w-[400px] h-7 pl-4 rounded-md mb-5 bg-white'><?php print $row['Teacher_Email'] ?></div>
			
				<!-- Request PDF Material -->
				<label for="material_pdf" class="text-xl"
					>Upload New Material (PDF MAX 400 KB)</label
				>
				<input
                    class="block mt-2 mb-4"
                    type="file"
                    name="pdf"
					accept=".pdf"
                />

				<!-- Submit Button -->
				<div class="mt-10">
					<button
						type="submit"
						name="Submit"
						class="bg-white w-32 h-8 rounded-xl hover:shadow-lg hover:-translate-y-1 transition-all"
					>
						Save Changes
					</button>
					<button
						type="reset"
						class="bg-white w-32 h-8 rounded-xl hover:shadow-lg hover:-translate-y-1 transition-all"
					>
						Reset
					</button>
				</div>
			</form>
		</div>
		<!-- //Main Content -->
	</body>
	<!-- Footer -->
	<div class="mt-10" id="footer"></div>
</html>

<?php
    }
?>

<?php
if (isset($_POST["Submit"])) {
	$Tutorial_ID = $_POST["Tutorial_ID"];
	$Tutorial_Name = $_POST["material_title"];
    $Teacher_Email = $_SESSION["teacher_email"];
    $PDFFile=$_FILES['pdf']['tmp_name'];
}
?>
