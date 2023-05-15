<?php
session_start();
if (isset($_POST["Submit"])) {
	$Tutorial_ID = $_POST["Tutorial_ID"];
	$Tutorial_ID = (int) $Tutorial_ID;
	$Tutorial_Name = $_POST["material_title"];
    $Teacher_Email = $_SESSION["teacher_email"];
    $PDFFile=$_FILES['pdf']['tmp_name'];
	include("conn.php");
	if($Tutorial_Name=="" && $PDFFile==""){
		echo "<script>alert('Nothing changed.');
		window.location.href='teacher-subject.php';</script>";
	}	
	else if($Tutorial_Name == "" && $PDFFile=$_FILES['pdf']['tmp_name']){
		$pdf_blob = fopen($PDFFile, "rb");
		if($_FILES['pdf']['size']>400000)
		{
			echo '<script>alert("Failed to upload. File size is too large.");
			javascript:history.go(-1);
			</script>';
		}
		else
		{
			$file = ("UPDATE tutorial SET Tutorial = :Tutorial WHERE Tutorial_ID='$Tutorial_ID'");
			$stmt = $pdo->prepare($file);
			$stmt->bindParam(':Tutorial', $pdf_blob, PDO::PARAM_LOB);
			if ($stmt->execute() === FALSE) {
			echo 'Failed to upload file. Please try again.';
			} 
			else {
			echo '<script>alert("Material has been modified!");
			window.location.href="teacher-subject.php";
			</script>';
			}
		}
		
	}
	else if($Tutorial_Name == $_POST["material_title"] && $PDFFile=$_FILES['pdf']['tmp_name']){
		$pdf_blob = fopen($PDFFile, "rb");
		if($_FILES['pdf']['size']>400000)
		{
			echo '<script>alert("Failed to upload. File size is too large.");
			javascript:history.go(-1);
			</script>';
		}
		else
		{
			$update =  mysqli_query($con,"UPDATE tutorial SET Tutorial_Name='$Tutorial_Name' WHERE Tutorial_ID='$Tutorial_ID'");
			$file = ("UPDATE tutorial SET Tutorial = :Tutorial WHERE Tutorial_ID='$Tutorial_ID'");
			$stmt = $pdo->prepare($file);
			$stmt->bindParam(':Tutorial', $pdf_blob, PDO::PARAM_LOB);
			if ($stmt->execute() === FALSE) {
			echo 'Failed to upload file. Please try again.';
			} 
			else {
			echo '<script>alert("Material has been modified!");
			window.location.href="teacher-subject.php";
			</script>';
			}
		}
	}
	else if($Tutorial_Name == $_POST["material_title"]){
		$sql =  mysqli_query($con,"UPDATE tutorial SET Tutorial_Name='$Tutorial_Name' WHERE Tutorial_ID='$Tutorial_ID'");
		echo '<script>alert("Material has been modified!");
		window.location.href="teacher-subject.php";
		</script>';
	}
}
?>