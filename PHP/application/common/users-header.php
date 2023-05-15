<?php
// ref = https://www.w3schools.com/php/php_mysql_select.asp
// ref 2 = https://www.youtube.com/watch?v=gCo6JqGMi30&ab_channel=DaniKrossing
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- common meta tags -->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- stylesheet links -->
	<link href="../css/style.css" rel="stylesheet" />
	<link href="../../style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css" />

	<style>
		.card-animation {
			transition-property: transform;
			transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
			transition-duration: 150ms;
		}

		.card-animation:hover {
			scale: 1.05;
			font-weight: 600;
		}
		
	</style>

	<!-- page title -->
	<title>Remi Education</title>
</head>

<body>
	<!-- header container -->
	<div class="border-b-2 shadow-md p-3 pr-6">
		<header class="flex justify-between">
			<div>
				<div class="logo">
				<button onclick="window.location.href='mainpage.php'" class="">
                <img src="./image/logo.png" class="max-w-[20%] mb-1 transition ease-in-out delay-200 = hover:-translate-y-1 hover:scale-110">
            </button>
				</div>
			</div>
			<!-- Header For Different Users -->
			<nav class="px-12 text-black text-2xl my-4 border-gray-200">
				<ul class="flex gap-6 md:px-6 md:gap-8">
					<li class="card-animation"><a href="contact_us.php" class="nav-top-text">Contact Us</a></li>
					<li class="card-animation"><a href="aboutus.php" class="nav-top-text">About Us</a></li>
					<?php
						// Student 
						if (isset($_SESSION["student_email"])){
							echo '
							<li class="card-animation"><a href="mainpage.php">Courses</a></li>
							<li class="card-animation"><a href="view-mcq.php">Quizzes</a></li>
							<li class="card-animation"><a href="a-dictionary.php">Educational Game</a></li>
							<li>
							<button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="card-animation">Profile</button>
							<ul class="py-1" aria-labelledby="dropdownLargeButton">
							<div id="dropdownNavbar" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">	
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100"><a href="my-account.php">My Account</a></li>
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100"><a href="favourite_list.php">Favourite</a></li>
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100"><a href="bookmark_list.php">Bookmarks</a></li>
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100 "><a href="logout.php">Logout</a></li>
								</ul>
							';
						}
						// Teacher
						else if (isset($_SESSION["teacher_email"])) {
							echo '
							<li class="card-animation"><a href="mainpage.php">Courses</a></li>
							<li>
							<button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="card-animation">Profile</button>
							<ul class="py-1" aria-labelledby="dropdownLargeButton">
							<div id="dropdownNavbar" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">	
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100"><a href="my-account.php">My Account</a></li>
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100"><a href="teacher-subject.php">Materials Created</a></li>
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100"><a href="teacher-mcqmain.php">Quizzes Created</a></li>
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100 "><a href="logout.php">Logout</a></li>
								</ul>
							';
						}
						// Admin
						else if (isset($_SESSION["admin_email"])) {
							echo '
							<li class="card-animation"><a href="teacher_account_list.php">Teachers</a></li>
							<li class="card-animation"><a href="mainpage.php">Courses</a></li>
							<li class="card-animation"><a href="createnewtopic.php">Create New Topic</a></li>
							<li class="card-animation"><a href="viewmessage.php">Messages</a></li>
							<li class="card-animation"><a href="signup-admin-panel.php">Sign Up Admin</a></li>
							<li>
							<button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="card-animation">Profile</button>
							<ul class="py-1" aria-labelledby="dropdownLargeButton">
							<div id="dropdownNavbar" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow">	
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100"><a href="my-account.php">My Account</a></li>
								<li class="card-animation block py-2 px-4 text-s text-gray-700 hover:bg-gray-100 "><a href="logout.php">Logout</a></li>
							</ul>
							';
						}
						// Guest
						else { 
							echo '
							<li class="card-animation"><a href="registration-panel.php">Login</a></li>
							<li class="card-animation"><a href="registration-panel.php">Join us!</a></li>
							'; 
						}
					?>	
						
				</ul>
			</nav>
		</header>
	</div>
	<!-- //header container -->
<!-- ref:https://flowbite.com/docs/getting-started/quickstart/ -->
<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</body>

</html>