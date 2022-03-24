<?php 
 
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
  ($ago > 60*24 && $ago < 60*24*(365/12)) && $ago = (($ago - $ago%(60*24))/(60*24))." day";
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