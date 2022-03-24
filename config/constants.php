<?php


session_start();


define('SITEURL', 'http://localhost/ConquerorConsultz/');
define('ASSETS', 'http://localhost/ConquerorConsultz/assets/');
define('ADMIN', 'http://localhost/ConquerorConsultz/admin/');

// define('SITEURL', 'http://192.168.43.222/ConquerorConsultz/');

define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', "");
define('DB_NAME', 'chides_estate');

// define('SITEURL', 'http://conquerorconsultz.com/');
// define('ASSETS', 'http://conquerorconsultz.com/assets/');
// define('ADMIN', 'http://conquerorconsultz.com/admin/');


// define('LOCALHOST', 'localhost');
// define('DB_USERNAME', 'conquer2_conquerorconsultz');
// define('DB_PASSWORD', 'conquerorconsultz');
// define('DB_NAME', 'conquer2_conquerorconsultz');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn, DB_NAME)  or die(mysqli_error());

 
 function getRealTime(){
    $date = explode(".", Date("y.m.d.h.i"));
    $month = $date[0]*12 + $date[1];
    $days = $month*(365/12) + $date[2];
    $hours = $days*24 + $date[3];
    $minutes = $hours*60 + $date[4];
    $now = $minutes;
    return $now;
}

 function getTime($time){
     $now = getRealTime();
    $ago = $now - $time;
   ($ago < 60) && $ago = $ago." minute";
  ($ago >= 60 && $ago < 60*24) && $ago = (($ago - $ago%60)/60)." hour";
  ($ago >= 60*24 && $ago < 60*24*7) && $ago = (($ago - $ago%(60*24))/(60*24))." day";
   ($ago >= 60*24*7 && $ago < 60*24*(365/12)) && $ago = (($ago - $ago%(60*24*7))/(60*24*7))." week";
  ($ago >= 60*24*(365/12) && $ago < 60*24*365) && $ago = (($ago - $ago%(60*24*(365/12)))/(60*24*(365/12)))." month";
  ($ago >= 60*24*365 ) && $ago = (($ago - $ago%(60*24*365))/(60*24*365))." year";

      $final = check($ago);

   return $final;
}


 function check($string){
    $check = explode(" ", $string);
    $num = $check[0];
    if ($num ==0){
        return "just now";
    }else if($num ==1){
        return $num." ".$check[1]." ago";
    }
   else {
        return $num." ".$check[1]."s ago";
    }
    return $num;

}




 