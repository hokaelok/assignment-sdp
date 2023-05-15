<!doctype html>
<html>

<head>
  <!-- Page Title -->
  <title>Remi Education</title>

  <!-- common meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- stylesheet links -->
  <link href="css/style.css" rel="stylesheet">
  <link href="../style.css" rel="stylesheet">
</head>

<body>
  <!-- landing impression section -->
  <div class="landingbg bg-fixed">

    <!-- login register section -->
    <div class="top-0 left-0 right-0 bg-black h-20 fixed z-10">
      <div class="flex flex-row px-5 pt-2 mt-1 justify-between fixed z-10 right-0">
        <ul class="flex items-center grow inline-flex">
          <li class="px-4">
            <a href="registration-panel.php" class="text-3xl text-white font['Verdana']">Login</a>
          </li>
          <li class="px-4">
            <button onclick="location.href = 'registration-panel.php';" , class="text-3xl text-white font['Verdana'] bg-sky-500 p-3">Join us! </button>
          </li>
      </div>
      <div class="flex flex-row px-5 pt-1 justify-between fixed z-20">
        <button onclick="window.location.href='index.php'" class="">
          <img src="./image/logo.png" class="max-w-[20%] mb-5 transition ease-in-out delay-200 = hover:-translate-y-1 hover:scale-110">
        </button>
      </div>
    </div>

    <!-- contents -->
    <div class="flex flex-row px-10 contrast-100 z-10">
      <div class="basis-1/2 place-content-center font-['Verdana']">
        <div class="mt-[20rem]">
          <h1 class="text-8xl text-center text-white font-bold">Learn while having FUN!</h1>
          <div class="mt-10 mx-[10rem]">

            <button onclick="location.href = 'registration-panel.php';" , class="text-5xl font-bold rounded-lg text-white bg-sky-500 font-['Verdana'] p-5 text-center self-center">Join Now!</button>
          </div>
        </div>
      </div>
      <div class="basis-1/2">
      </div>
    </div>
  </div>
  </div>

  <!-- second half -->
  <div class="bg-white h-full">
    <div class="flex flex-row pt-20">
      <div class=" px-20 basis-1/3">
        <h1 class="text-8xl font['Verdana'] font-bold">What do we teach?</h1>
        <p class="mt-10 text-3xl font['Verdana']">In Remi's Education, we teach multiple courses including English and Spanish.
          We also provide entertainment educational games for students to be interested in learning.
        </p>
      </div>
      <div class="basis-2/3">
        <div class="flex gap-x-[12rem] p-10 ml-32">
          <div class="bg-[url('../image/img1.png')] bg-no-repeat bg-cover h-80 w-80">
          </div>
          <div class="bg-[url('../image/img2.png')] bg-no-repeat bg-center bg-cover h-80 w-80">
          </div>
        </div>
        <div class="flex gap-x-[12rem] p-10 ml-32">
          <div class="bg-[url('../image/img3.png')] bg-no-repeat bg-center bg-cover h-80 w-80">
          </div>
          <div class="bg-[url('../image/img4.jpg')] bg-no-repeat bg-center bg-cover  h-80 w-80">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <hr>
  <?php
  include('common/footer.php')
  ?>

</body>

</html>