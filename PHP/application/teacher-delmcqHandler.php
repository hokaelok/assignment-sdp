<?php
include('conn.php');
session_start();

$uid = $_GET["mcqID"];
// echo $jsondata;

$sql = "DELETE FROM `mcq` WHERE  mcqUID='$uid'";

$sqlPost = mysqli_prepare($con,$sql);
mysqli_stmt_execute($sqlPost);

mysqli_close($con);
echo "<script>
    alert('data deleted successfully');
    javascript:history.go(-1);
    </script>"
?>