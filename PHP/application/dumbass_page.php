<!DOCTYPE html>
<html>

<head>
    <!-- Page Title -->
    <title>Remi Education</title>

    <!-- common meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-withd, initial-scale=1">

    <!-- css styling -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to right, lightblue , rgb(255,255,255));
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 200px;
        }

        div {
            margin-top: 170px;
        }

        h1 {
            font-family: 'Lobster', cursive;
            color: blue;
        }

        img {
            height: 310px;
            border-radius: 100px;
        }
    </style>
</head>

<body>
    <!-- Announcement -->
    <div>
        <h1>
            Hey Buddy, your account has been created!
        </h1>
        <h1>
            Let's start your journey now!
        </h1>
        <img src="image/dumbass.jpg">
    </div>

    <script>
        // Redirect customer to Sign In Page after specific duration
        var seconds = 5;
        setInterval(function() {
        seconds --;
        if (seconds == 0) {
            window.location = "index.php";
        }
        },1000)

    </script>
</body>

</html>