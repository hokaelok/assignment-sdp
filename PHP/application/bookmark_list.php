<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Remi Education</title>

    <!-- common meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- stylesheet links -->
    <link href="../style.css" rel="stylesheet" />
    <link href="../build/css/style.css" rel="stylesheet" />
    <link href="../application/css/style.css" rel="stylesheet" />

    <!-- import jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- render header script -->
    <script>
        $(function() {
            $("#footer").load("common/footer.php");
        });
    </script>

    <!-- CSS -->
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
        margin: 150px auto 300px auto;
        height: auto;
        width: 80%;
        /* height120px;width:120px;border:1px solid #ccc;overflow:auto; */
        }

        .deleteBTN {
            width: 150px;
            height: 40px;
            text-align: center;
            color:rgb(254, 150, 137);
            
        }

        .deleteBTN:hover {
            cursor: pointer;
            background-color: rgb(254, 150, 137);
            color:white;
            border-radius: 15px;
            transition: background-color 0.5s ease-in; 
        }
    </style>
</head>

<body>
<!-- Header -->
<?php 
session_start();
include 'common/users-header.php'; ?>

<!-- Main Content -->
<div class="wrapper">

<!-- title -->
    <h1 class="text-5xl font-['Verdana'] text-center font-bold">Bookmarks</h1><br>
    <hr>
    
    <!-- table header -->
    <table>
        <tr>
            <th>Tutorial Name</th>
            <th>Topic</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>

        <?php
            //connect database
            include ("conn.php");
            //get data from database
            if(isset($_SESSION["student_email"])){
                $Email = $_SESSION["student_email"];
            // get bookmark info from bookmark table
            $sql = mysqli_query($con, "SELECT * FROM bookmark WHERE Email = '$Email'");
            while($row = mysqli_fetch_array($sql)) {
                $Email = $row["Email"];
                $Tutorial_ID = $row['Tutorial_ID'];
                $Date = $row['Date'];

                // get tutorial info from tutorial table
                $sql_run = mysqli_query($con, "SELECT * FROM tutorial WHERE Tutorial_ID = '$Tutorial_ID';");
                while ($row = mysqli_fetch_assoc($sql_run)) {
                    $Tutorial_Name = $row['Tutorial_Name'];
                    $Topic_ID = $row['Topic_ID'];
                    $topic = mysqli_query($con, "SELECT * FROM topic WHERE Topic_ID = '$Topic_ID';");
                    while ($row = mysqli_fetch_assoc($topic)) {
                        $Topic = $row['Topic'];

                        echo '
                        <!--Display Favourite Table  -->
                        <tr>
                            <td><a href="tutorial.php?Tutorial_ID='.$Tutorial_ID.'">'.$Tutorial_Name.'</a></td>
                            <td>'.$Topic.'</td>
                            <td>'.$Date.'</td>
                            <td><a href="delete-favourite.php?Tutorial_ID='.$Tutorial_ID.'">
                            <button class="deleteBTN" onclick="delete">Delete</button></a></td>
                        </tr>';
                   
                    } 
                }
            }
        }
        ?>
        
    </table>


</div>
</body>
<!-- Footer -->
<div id="footer"></div>
</html>