<?php
session_start();
if (isset($_POST["Submit"])) {
    $material_type = $_POST["material_type"];
    $material_title = $_POST["material_title"];
    $teacher_email = $_SESSION["teacher_email"];
    $topic = $_POST["topic"];
    $PDFFile=$_FILES['pdf']['tmp_name'];
    include("conn.php");
    if(($_SESSION["teacher_status"])=="Active"){
    $tutorial = mysqli_query($con, "SELECT * FROM tutorial");
        while($row = mysqli_fetch_array($tutorial)) {
            $found=mysqli_query($con,"SELECT * FROM tutorial WHERE Tutorial_Name ='$material_title' AND Teacher_Email = '$teacher_email' limit 1");
            if(mysqli_num_rows($found)==1){
                echo '<script>alert("Material exists!");
                window.location.href="create-material.php";
                        </script>';
             }
            else{
            $sql = mysqli_query($con, "SELECT * FROM topic WHERE Topic = '$topic' GROUP BY NOT NULL");
                if(mysqli_num_rows($sql)==1){
                    while($row = mysqli_fetch_array($sql)) {
                        $Topic_ID = $row['Topic_ID'];
                    //ref:https://medium.com/an-idea/use-mysql-blob-column-with-php-to-store-pdf-file-13f4277b68c3
                    $pdf_blob = fopen($PDFFile, "rb");
                    $insert = "INSERT INTO tutorial (Tutorial_Name, Category, Topic_ID, Teacher_Email, Tutorial)
                    VALUES
                    ('$material_title', '$material_type', '$Topic_ID' , '$teacher_email', :Tutorial)";
                    $stmt = $pdo->prepare($insert);
                    $stmt->bindParam(':Tutorial', $pdf_blob, PDO::PARAM_LOB);
                    if ($stmt->execute() === FALSE) {
                    echo 'Failed to upload file. Please try again.';
                    } 
                    else {
                    echo '<script>alert("Material has been created!");
                    window.location.href="create-material.php";
                    </script>';
                    }
                }
                }
                else if (mysqli_num_rows($sql)<=0){
                    echo '<script>alert("Topic entered not exists!");
                        javascript:history.go(-1);
                        </script>';
                        break;
                
                }
            }
        }
    }
    else if(($_SESSION["teacher_status"])=="Inactive"){
        echo '<script>alert("You could not create material as your account status is not active. Please Contact Admin.");
        javascript:history.go(-1);
        </script>';
    }
    mysqli_close($con);
}
?>