<?PHP
//connect to database
include('conn.php');

//get the data from url
$Teacher_Email=$_GET['Teacher_Email'];

$date=date("Y-m-d");
// modify teacher status
$data = mysqli_query($con,"SELECT * FROM teacher WHERE Teacher_Email='$Teacher_Email';");
while($row = mysqli_fetch_assoc($data)) {
     $Teacher_Email = $row['Teacher_Email'];
     $Teacher_Name = $row['Teacher_Name'];
     $Phone_Number = $row['Phone_Number'];
     $Status = $row['Status'];

// modify teacher status
if($Status=="Active"){
     $sql=mysqli_query($con,"update teacher
     set
     Status='Inactive'
     where Teacher_Email='$Teacher_Email' ");
     //back to teacher account list
     echo"<script>
          alert('Teacher account had been deactivated on $date');
          window.location.href='teacher_account_list.php';
          </script>";
     }

else if($Status=="Inactive"){
     $sql=mysqli_query($con,"update teacher
     set
     Status='Active'
     where Teacher_Email='$Teacher_Email' ");
     //back to teacher account list
     echo"<script>
          alert('Teacher account had been activated on $date');
          window.location.href='teacher_account_list.php';
          </script>";
     }
}
?>