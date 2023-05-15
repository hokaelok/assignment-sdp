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
        <div class="w-full">
		<?php
			$Tutorial_ID = $_GET['Tutorial_ID'];
			$tutorial = mysqli_query($con, "SELECT * FROM tutorial WHERE Tutorial_ID='$Tutorial_ID'");
			while($row = mysqli_fetch_array($tutorial)) {
				$Tutorial_Name = $row['Tutorial_Name'];
				$Tutorial = $row['Tutorial'];
				$Teacher_Email = $row['Teacher_Email'];
				$teacher = mysqli_query($con, "SELECT * FROM teacher WHERE Teacher_Email='$Teacher_Email' ");
				while($row = mysqli_fetch_array($teacher)) {
					$Teacher_Name = $row['Teacher_Name'];
				echo'
				<h1 class="text-6xl m-10">'.$Tutorial_Name.'</h1>
				<h3 class="text-3xl m-10">By '.$Teacher_Name.'</h3>
				<button class="rounded-md bg-slate-200 p-2 mx-8 mb-5">
				<a href="add-to-bookmark.php?Tutorial_ID='.$Tutorial_ID.'">
					<span class="text-lg">
						<i
							class="fa fa-bookmark-o text-green-600 bg-green-200"
							id="bookmark"
							style="font-size: 24px"
						></i>
						Bookmark
					</span>
				</a>
				</button>
				<button class="rounded-md bg-slate-200 p-2 mx-8">
				<a href="add-to-favourite.php?Tutorial_ID='.$Tutorial_ID.'">
					<span class="text-lg">
						<i
							class="fa fa-heart-o text-red-600 bg-pink-200"
							id="favourite"
							style="font-size: 24px"
						></i>
						Favorite
					</span>
				</a>
				</button>

				<!-- section 1 -->
				<section class="h-max m-auto bg-blue-300 p-8">
				<object data="data:application/pdf;base64,'.base64_encode(".$Tutorial.").'" type="application/pdf" style="height:1000px;width:100%"></object>
				</section>';
					}
				}
			?>

            <!-- disqus -->
			<div id="disqus_thread" class="px-[16rem] pt-12"></div>
        </div>

        <!-- disqus rendering script -->
        <script>
			var disqus_config = function () {
				this.page.url = "disqus_test.php"; // Replace PAGE_URL with your page's canonical URL variable
				this.page.identifier = "#DISQUS-0001"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			};

			(function () {
				// DON'T EDIT BELOW THIS LINE
				var d = document,
					s = d.createElement("script");
				s.src = "https://sdp-remi-education.disqus.com/embed.js";
				s.setAttribute("data-timestamp", +new Date());
				(d.head || d.body).appendChild(s);
			})();
		</script>
		<noscript
			>Please enable JavaScript to view the
			<a href="https://disqus.com/?ref_noscript"
				>comments powered by Disqus.</a
			></noscript>

		<script
			id="dsq-count-scr"
			src="//sdp-remi-education.disqus.com/count.js"
			async
		></script>
	</body>
    <!-- Footer -->
	<div id="footer"></div>
</html>

