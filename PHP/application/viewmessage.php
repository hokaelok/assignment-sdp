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

    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }
    
    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }
    
    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }
    
    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 16px 12px;
        border: 1px solid #ccc;
        border-top: none;
        text-align: left;
    }

  </style>
</head>
<body>
    <!-- Header -->
    <?php
    session_start();
    if (isset($_SESSION["student_email"])) {
        include('common/users-header.php');
    }
    else if (isset($_SESSION["teacher_email"])) {
        include('common/users-header.php');
    }
    else if (isset($_SESSION["admin_email"])) {
        include('common/users-header.php');
    }
    else{
        include('common/header.php');
    }
    ?>

    <!-- Main Content -->
    <div class="wrapper">
    <!-- Filter Message By Using Tab -->
    <div class="tab">
    <button class="tablinks" onclick="petAdvice(event, 'All')" id="defaultOpen">All Messages</button>
    <button class="tablinks" onclick="petAdvice(event, 'Create')">Create New Topic</button>
    <button class="tablinks" onclick="petAdvice(event, 'Other')">General Messages</button>
    <button class="tablinks" onclick="petAdvice(event, 'Bugs')">Bugs Report</button>
    <button class="tablinks" onclick="petAdvice(event, 'Report')">Students' Favourite Report</button>
    </div>
    <div id="All" class="tabcontent">
    <h1 class="text-5xl font-['Verdana'] text-center font-bold">Customer Messages</h1>
    <br><br>
    <!-- table header -->    
    <table>
        <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Issue</th>
        <th>Message</th>
        </tr>

        <?php
            include ("conn.php"); 
            // get all messages from message table 
            $sql = mysqli_query($con, "SELECT * FROM message ORDER BY Message_ID desc");
            while($row = mysqli_fetch_array($sql)) {
                $Email = $row['Email'];
                $Name = $row['Name'];
                $Issue = $row['Issue'];
                $Message = $row['Message'];
            
            // display table
            $data="
            <tr>
                <td>$Email</td>
                <td>$Name</td>
                <td>$Issue</td>
                <td>$Message</td>
            </tr>";
            echo $data;
            }
        ?>
    </table>
    </div>
    
    <div id="Create" class="tabcontent">
    <h3 class="text-5xl font-['Verdana'] text-center font-bold">New Topic Requests</h3>
    <br><br>
    <!-- table header -->    
    <table>
        <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Message</th>
        </tr>

        <?php
            // get create new topic messages from message table 
            $sql = mysqli_query($con, "SELECT * FROM message WHERE Issue='CreateTopic' ORDER BY Message_ID desc");
            while($row = mysqli_fetch_array($sql)) {
                $Email = $row['Email'];
                $Name = $row['Name'];
                $Message = $row['Message'];
            
            // display table
            $data="
            <tr>
                <td>$Email</td>
                <td>$Name</td>
                <td>$Message</td>
            </tr>";
            echo $data;
            }
        ?>
    </table>
    </div>
    <div id="Other" class="tabcontent">
    <h3 class="text-5xl font-['Verdana'] text-center font-bold">General Messages</h3>
    <br><br>
    <!-- table header -->    
    <table>
        <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Message</th>
        </tr>

        <?php
            // get other issue messages from message table 
            $sql = mysqli_query($con, "SELECT * FROM message WHERE Issue='Other' ORDER BY Message_ID desc");
            while($row = mysqli_fetch_array($sql)) {
                $Email = $row['Email'];
                $Name = $row['Name'];
                $Message = $row['Message'];
            
            // display table
            $data="
            <tr>
                <td>$Email</td>
                <td>$Name</td>
                <td>$Message</td>
            </tr>";
            echo $data;
            }
        ?>
    </table>
    </div>
    <div id="Bugs" class="tabcontent">
    <h3 class="text-5xl font-['Verdana'] text-center font-bold">Bugs Report</h3>
    <br><br>
    <!-- table header -->    
    <table>
        <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Message</th>
        </tr>

        <?php
            // get bugs messages from message table 
            $sql = mysqli_query($con, "SELECT * FROM message WHERE Issue='Bugs' ORDER BY Message_ID desc");
            while($row = mysqli_fetch_array($sql)) {
                $Email = $row['Email'];
                $Name = $row['Name'];
                $Issue = $row['Issue'];
                $Message = $row['Message'];
            
            // display table
            $data="
            <tr>
                <td>$Email</td>
                <td>$Name</td>
                <td>$Message</td>
            </tr>";
            echo $data;
            }
        ?>
    </table>
    </div>
    <div id="Report" class="tabcontent">
    <h3 class="text-5xl font-['Verdana'] text-center font-bold">Students' Favourite Report</h3>
    <?php $date=date("Y-m-d");
    echo "<h4 class='text-lg font-['Verdana'] text-center'> Date:$date </h4>"?>
    <br><br>
    <!-- table header -->    
    <table class='border-0'>
        <tr>
        <th class='border-0'>Tutorial</th>
        <th class='border-0'>Topic</th>
        <th class='border-0'>Category</th>
        <th class='border-0'>Number of Student</th>
        </tr>

        <?php
            // get other issue messages from message table 
            $sql = mysqli_query($con, "SELECT Favourite_ID,Tutorial_ID, COUNT(Tutorial_ID) AS TotalLike FROM favourite GROUP BY Tutorial_ID ORDER BY TotalLike DESC");
            while($row = mysqli_fetch_array($sql)) {
                $Tutorial_ID = $row['Tutorial_ID'];
                $TotalLike=$row['TotalLike'];
                $tutorial = mysqli_query($con, "SELECT * FROM tutorial WHERE Tutorial_ID=$Tutorial_ID");
                while($row = mysqli_fetch_array($tutorial)){
                    $Tutorial= $row['Tutorial_Name'];
                    $Category = $row['Category'];
                    $Topic_ID = $row['Topic_ID'];
                    $topic = mysqli_query($con, "SELECT * FROM topic WHERE Topic_ID=$Topic_ID");
                    while($row = mysqli_fetch_array($topic)){
                        $Topic= $row['Topic'];
                    // display table
                    $data="
                    <tr class='border-0'>
                        <td class='border-0'>$Tutorial</td>
                        <td class='border-0'>$Topic</td>
                        <td class='border-0'>$Category</td>
                        <td class='border-0'>$TotalLike</td>
                    </tr>";

                    echo $data;
                    }
                }
            }
        ?>
    </table>
    <?php 
        $count=mysqli_query($con, "SELECT favourite.Tutorial_ID, tutorial.Tutorial_Name, COUNT(favourite.Tutorial_ID) As Highest FROM favourite INNER JOIN tutorial ON tutorial.Tutorial_ID=favourite.Tutorial_ID Group by tutorial.Tutorial_ID,favourite.Tutorial_ID HAVING COUNT(favourite.Tutorial_ID) = (SELECT MAX(Highest) FROM (SELECT COUNT(favourite.Tutorial_ID) As Highest FROM favourite Group by favourite.Tutorial_ID) As Highest)");
        while($row = mysqli_fetch_array($count)) {
            $tutorial=$row['Tutorial_Name'];
            $highest=$row['Highest'];
            ?>
            <br><br><br>
            <div class="text-2xl font-['Verdana']">
            <?php
            echo 'The tutorial most popular is '.$tutorial.' which liked by '.$highest.' students.';
        }
    ?>
    </div>
    </div>

    <script>
        function petAdvice(event, pettype) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(pettype).style.display = "block";
        event.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
</div>
<!-- Footer -->
<div id="footer" style="position: relative; margin-top: 20px;"></div>
</body>
</html>
