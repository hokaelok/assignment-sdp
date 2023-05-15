<!DOCTYPE html>
<html lang="en">
<head>
  <!-- page title -->
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
      $(function(){ 
          $("#footer").load("common/footer.php");
      });

  </script>

  <!-- css styling -->
  <style>
  html,body{
    height: 100%;
    width: 100%;
    place-items: center;
    font-family:Verdana;
  }

  th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:#516166 ;
    color: white;
    text-align: center;
    width: 10%;
  }

  table, td, th {
    border: 1px solid black;
    text-align: center;
    font-family:Verdana;
    font-size:20px;
  }
    
  table {
    border-collapse: collapse;
    width: 100%;
  }

  .wrapper{
    overflow:hidden;
    background: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
    top:20%;
    left:10%;
    margin: 150px auto 40rem auto;
    height: auto;
    width: 80%;
    /* height120px;width:120px;border:1px solid #ccc;overflow:auto; */
  }

  .statusBTN {
      width: 150px;
      height: 40px;
      text-align: center;
      color:rgb(254, 150, 137);
      
  }

  .statusBTN:hover {
      cursor: pointer;
      background-color: rgb(254, 150, 137);
      color:white;
      border-radius: 15px;
      transition: background-color 0.5s ease-in; 
  }
  
  .teachBTN {
      width: auto;
      height: 40px;
      margin-right:2%;
      color:red;
      font-size: 30px;
      
  }

  .teachBTN:hover {
      cursor: pointer;
      background-color: white;
      color:rgb(192, 51, 66);
      border-radius: 15px;
      transition: background-color 0.5s ease-in; 
  }

  </style>
</head>
<body>
  <!-- Header -->
  <?php 
		include('conn.php');
		session_start();
		include 'common/users-header.php'; ?>

  <!-- Main Content -->
  <div class="wrapper">
  <h1 class="text-5xl font-['Verdana'] text-center font-bold">Teacher Accounts</h1><br>
    <a href="registration-panel.php">
    <button class='teachBTN' onclick='teacher'>Register New Teacher</button>
    </a>
  <br><br>
  <!-- table header -->    
  <table>
    <tr>
      <th>Email</th>
      <th>Name</th>
      <th>Phone Number</th>
      <th>Status</th>
    </tr>

    <?php
      // get supplier info from supplier table
      $sql = mysqli_query($con, "SELECT * FROM teacher");
      while($row = mysqli_fetch_array($sql)) {
          $Teacher_Email = $row['Teacher_Email'];
          $Teacher_Name = $row['Teacher_Name'];
          $Phone_Number = $row['Phone_Number'];
          $Status = $row['Status'];
      
      // display table
      $data="
      <tr>
          <td><a href='teacher-subject.php?Teacher_Email=".$Teacher_Email."'>$Teacher_Email</a></td>
          <td>$Teacher_Name</td>
          <td>$Phone_Number</td>
          <td><a href='activation.php?Teacher_Email=".$Teacher_Email."'>
          <button class='statusBTN' onclick='status'>".$Status."</button></a></td>
      </tr>";
      echo $data;
      }
    ?>
  </table>
</div>
</body>

<!-- Footer -->
<div id="footer" style="position: relative; margin-top: 20px;"></div>
</html>
