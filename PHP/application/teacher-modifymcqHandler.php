<?php
include('conn.php');
session_start();

$jsondata = $_GET["JsonData"];
// echo $jsondata;
$data = json_decode($jsondata, true);
$id = $data['mcq-uid'];

$sql = "UPDATE mcq SET mcqData='$jsondata' WHERE mcqUID='$id'";

// $sql = "INSERT INTO mcq (mcqUID, email, mcqData) VALUES ('$id', '$email', '$jsondata')";
$sqlPost = mysqli_prepare($con,$sql);
mysqli_stmt_execute($sqlPost);

mysqli_close($con);
echo "<script>
    alert('data added successfully');
    javascript:history.go(-1);
    </script>"
?>