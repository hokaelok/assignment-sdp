<?php include("conn.php"); 
session_start()?>
<!DOCTYPE html>
<html>
    <head>
        <title>Remi Education</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script>
            $(function(){ 
                $("#footer").load("common/footer.php");
            });

        </script>
        <style>
            .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
            }

            .profile-button {
                background: rgb(99, 39, 120);
                box-shadow: none;
                border: none
            }

            .profile-button:hover {
                background: #682773
            }

            .profile-button:focus {
                background: #682773;
                box-shadow: none
            }

            .profile-button:active {
                background: #682773;
                box-shadow: none
            }

            .back:hover {
                color: #682773;
                cursor: pointer
            }

            .labels {
                font-size: 11px
            }

            .add-experience:hover {
                background: #BA68C8;
                color: #fff;
                cursor: pointer;
                border: solid 1px #BA68C8
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <?php
        include('common/users-header.php');
        ?>

        <!-- Main Content -->
        <!-- Student -->
    <?php
    if (isset($_SESSION["student_email"])) {
        echo "
        <div class='flex'>
        <div class='flex bg-blue-400 m-auto my-10 w-[1000px] p-8 rounded-lg'>
            <div class='w-[500px]'>
                <div class='text-center mt-28'>
                    <img class='rounded-[100px] w-32 mb-3 m-auto' width='150px' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>
                    
                    <span class='font-bold'><p>". $_SESSION["student_email"] ."</p></span>
                </div>
            </div>
            <div class='w-full pl-5'>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-2'>
                        <h4 class='text-right text-xl font-bold text-light fs-2'> Edit Profile Settings</h4>
                    </div>
                    <div class='row my-10'>
                    <form action='my-account-update.php' method='POST'>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Name</label>
                            <input type='text' class='form-control w-[400px]' placeholder='". $_SESSION["student_name"] ."' value='' name='u_name'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Email</label>
                            <input type='text' class='form-control w-[400px]' placeholder='". $_SESSION["student_email"] ."' value='' name='u_email'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Phone Number</label>
                            <input type='tel' class='form-control w-[400px]' placeholder='". $_SESSION["student_phnum"] ."' value='' name='u_phnum'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>New Password</label>
                            <input type='password' class='form-control w-[400px]' placeholder='***********' name='u_pw'>
                        </div>
                        
                    </div>
                    <div class='mt-5 text-center'>
                        <button class='bg-blue-200 text-blue-600 p-2 rounded-md hover:bg-blue-600 hover:text-blue-200 mr-5' type='submit' name='save-profile-btn' >Save Changes</button>
                        <button class='bg-blue-200 text-blue-600 p-2 rounded-md hover:bg-blue-600 hover:text-blue-200' type='reset' name='discard-changes-btn'>Disard Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        ";
    }
    // Teacher
    else if(isset($_SESSION["teacher_email"])) {
        echo "
        <div class='flex'>
        <div class='flex bg-blue-400 m-auto my-10 w-[1000px] p-8 rounded-lg'>
            <div class='w-[500px]'>
                <div class='text-center mt-28'>
                    <img class='rounded-[100px] w-32 mb-3 m-auto' width='150px' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>
                    
                    <span class='font-bold'><p>". $_SESSION["teacher_email"] ."</p></span>
                </div>
            </div>
            <div class='w-full pl-5'>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-2'>
                        <h4 class='text-right text-xl font-bold text-light fs-2'> Edit Profile Settings</h4>
                    </div>
                    <div class='row my-10'>
                    <form action='my-account-update.php' method='POST'>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Name</label>
                            <input type='text' class='form-control w-[400px]' placeholder='". $_SESSION["teacher_name"] ."' value='' name='u_name'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Email</label>
                            <input type='text' class='form-control w-[400px]' placeholder='". $_SESSION["teacher_email"] ."' value='' name='u_email'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Phone Number</label>
                            <input type='tel' class='form-control w-[400px]' placeholder='". $_SESSION["teacher_phnum"] ."' value='' name='u_phnum'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>New Password</label>
                            <input type='password' class='form-control w-[400px]' placeholder='***********' name='u_pw'>
                        </div>
                        
                    </div>
                    <div class='mt-5 text-center'>
                        <button class='bg-blue-200 text-blue-600 p-2 rounded-md hover:bg-blue-600 hover:text-blue-200 mr-5' type='submit' name='save-btn' >Save Changes</button>
                        <button class='bg-blue-200 text-blue-600 p-2 rounded-md hover:bg-blue-600 hover:text-blue-200' type='reset' name='discard-changes-btn'>Disard Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        ";
    }
    // Admin
    else if(isset($_SESSION["admin_email"])) {
        echo "
        <div class='flex'>
        <div class='flex bg-blue-400 m-auto my-10 w-[1000px] p-8 rounded-lg'>
            <div class='w-[500px]'>
                <div class='text-center mt-28'>
                    <img class='rounded-[100px] w-32 mb-3 m-auto' width='150px' src='https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg'>
                    
                    <span class='font-bold'><p>". $_SESSION["admin_email"] ."</p></span>
                </div>
            </div>
            <div class='w-full pl-5'>
                <div class='p-3 py-5'>
                    <div class='d-flex justify-content-between align-items-center mb-2'>
                        <h4 class='text-right text-xl font-bold text-light fs-2'> Edit Profile Settings</h4>
                    </div>
                    <div class='row my-10'>
                    <form action='my-account-update.php' method='POST'>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Name</label>
                            <input type='text' class='form-control w-[400px]' placeholder='". $_SESSION["admin_name"] ."' value='' name='u_name'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Email</label>
                            <input type='text' class='form-control w-[400px]' placeholder='". $_SESSION["admin_email"] ."' value='' name='u_email'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Phone Number</label>
                            <input type='tel' class='form-control w-[400px]' placeholder='". $_SESSION["admin_phnum"] ."' value='' name='u_phnum'>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>Position</label>
                            <div class='border-2 border-white w-[400px] h-7 pl-4 rounded-md mb-4 bg-white'>". $_SESSION["admin_position"] ."</div>
                        </div><br>
                        <div class='col-md-19' style='text-align: left;'>
                            <label class='labels text-lg block'>New Password</label>
                            <input type='password' class='form-control w-[400px]' placeholder='***********' name='u_pw'>
                        </div>
                        
                    </div>
                    <div class='mt-5 text-center'>
                        <button class='bg-blue-200 text-blue-600 p-2 rounded-md hover:bg-blue-600 hover:text-blue-200 mr-5' type='submit' name='save-p-btn' >Save Changes</button>
                        <button class='bg-blue-200 text-blue-600 p-2 rounded-md hover:bg-blue-600 hover:text-blue-200' type='reset' name='discard-changes-btn'>Disard Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        ";
    }

    else {
        echo"<script>
            alert('You need to sign in first to access this page.');
            window.location.href='registration-panel.php';
            </script>";
    };
    ?>
    </body>
    <div id="footer"></div>
</html>
