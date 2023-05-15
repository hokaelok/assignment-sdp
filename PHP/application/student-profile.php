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
			include('common/users-header.php');
		?>

		<!-- Main Content -->

		<?php
		if (isset($_SESSION["student_email"])) {
			echo '
			<div class="flex">
				<div class="flex bg-blue-400 m-auto my-10 w-[1000px] p-8 rounded-lg">
					<div class="w-[500px]">
						// profile picture
						<div class="text-center mt-28">
							<img src="/PHP/application/image/apple.PNG" alt="profile-picture" class="rounded-[100px] w-32 mb-3 m-auto"/>
							<span><p>'.$_SESSION["student_email"].'</p></span>
						</div>
					</div>
					<div class="w-full pl-5">
						<h2 class="my-8 text-xl font-bold">
							Edit Profile Settings
						</h2>
						<form action="#" method="POST">
							// user name
							<div class="">
								<label for="user_name" class="block">Name</label>
								<input
									type="text"
									name="user_name"
									placeholder='. $_SESSION["student_name"] .'
									class="w-3/4 h-8 rounded-md pl-3"
								/>
							</div>
							<br />

							// user email
							<div class="">
								<label for="user_email" class="block">Email</label>
								<input
									type="email"
									name="user_email"
									placeholder='. $_SESSION["student_email"] .'
									class="w-3/4 h-8 rounded-md pl-3"
								/>
							</div>
							<br />

							// user contact
							<div class="">
								<label for="user_contact" class="block"
									>Contact Number</label
								>
								<input
									type="tel"
									name="user_contact"
									placeholder='. $_SESSION["student_phnum"] .'
									class="w-3/4 h-8 rounded-md pl-3"
								/>
							</div>
							<br />

							// user password
							<div class="">
								<label for="user_password" class="block"
									>New Password</label
								>
								<input
									type="password"
									name="user_password"
									placeholder="********"
									class="w-3/4 h-8 rounded-md pl-3"
								/>
							</div>

							// buttons
							<div class="w-fit m-auto my-10 flex gap-8">
								<button
									class="rounded-md border-black border-2 p-2 bg-white"
								>
									Discard Changes
								</button>
								<button
									class="rounded-md border-black border-2 p-2 bg-white"
								>
									Save Profie Changes
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			';
				}

			else {
				echo"<script>
					alert('You need to sign in first to access this page.');
					window.location.href='registration_panel.php';
					</script>";
			};

		?>

		<!-- //Main Content -->
	</body>

	<!-- Footer -->
	<div id="footer"></div>
</html>
