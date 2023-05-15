<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Page Title -->
    <Title>Remi Education</Title> 

    <!-- common meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- stylesheet -->
    <link href="../application/css/style.css" rel="stylesheet" />
</head>  
<body>
<!--Header-->
<?php
session_start();
include('../application/common/users-header.php');
?>
<script type="text/javascript" src="./js/dictionary_api.js"></script>
<div class="flex flex-row">
    <div class="basis-1/12">
    <button class="bg-sky-500 h-10 w-[7rem] text-white rounded-md ml-2 mt-10" onclick="javascript:history.go(-1);">Back</button>
    </div>
    <div class="basis-10/12">
        <div>
            <h1 class="mt-40 text-5xl font-['Verdana'] font-bold text-center">GUESS THE WORD!</h1>
        </div>
        <div class="px-10 pb-10 shadow-md rounded-md bg-white">
            <h2 id="main-word" class="mt-40 text-3xl font-['Verdana'] hidden"></h2>
            <p class="mt-10 pt-5 text-2xl font-bold">Definition: </p><br>
            <p id="definition" class="text-xl"></p>
        </div>
        <div class="px-10 flex flex-col">
            <div class="">
                <div class="">
                    <form method="POST" onsubmit="return WordChecker()" class="basis-1/3 flex flex-col p-10" id="myForm">
                        <div class="mb-5">
                            <p class="pt-2 text-base text-bold text-red-500 hidden" id="l-hinter-w"></p> <!-- length hinter -->
                            <p class="pt-2 text-base text-bold text-emerald-600 hidden" id="l-hinter-r"></p>
                            <p class="pt-2 text-base text-bold text-emerald-600 hidden" id="a-hinter-r"></p> <!-- amount letter hinter -->
                            <p class="pt-2 text-base text-bold text-emerald-600 hidden" id="p-hinter-r"></p>
                            <p class="pt-2 text-base text-bold text-red-500 hidden" id="a-hinter-w"></p>
                            <p class="pt-2 text-base text-bold text-red-500 hidden" id="p-hinter-w"></p> <!-- position hinter -->
                        </div>
                        <input type="text" class="border-2 border-sky-500  focus:outline-none focus:ring focus:ring-blue-300 rounded-lg h-16 px-5">
                        <div class="flex flex-row mt-10 align-self-center">
                            <div class="w-48 basis-1/2 flex flex-row">
                                <div class="basis-1/3"></div>
                                <div class="basis-1/3">
                                    <input type="submit" value="Submit" class="bg-blue-500 h-16 text-white cursor-pointer w-64 rounded-lg text-xl">
                                </div>
                                <div class="basis-1/3"></div>
                            </div>
                            <div class="w-48 basis-1/2 flex flex-row">
                                <div class="basis-1/3"></div>
                                <div class="basis-1/3">
                                    <button onclick="EasyWordGeneator()" id="refresh" class="bg-blue-500 h-16 text-white cursor-pointer w-64 rounded-lg text-xl">New word</button>
                                    <script type="text/javascript">
                                        var myLink = document.getElementById('refresh');

                                        refresh.onclick = function() {

                                            var script = document.createElement("script");
                                            script.type = "text/javascript";
                                            script.src = "./js/dictionary_api.js";
                                            document.getElementsByTagName("head")[0].appendChild(script);
                                            return false;

                                        }
                                    </script>
                                </div>
                                <div class="basis-1/3"></div>
                            </div>
                        </div>

                        <script>
                            var form = document.getElementById("myForm");

                            function handleForm(event) {
                                event.preventDefault();
                            }
                            form.addEventListener('submit', handleForm);
                        </script>
                        </script>
                    </form>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
</div>

<div class="top-0 bg-sky-500 w-full mt-20">
        <?php
        include('common/footer.php');
        ?>
    </div>
</body>

</html>