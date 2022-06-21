<?php
// define('URL_IMG','image/');
// define('URL_SITE','site/');
// define('URL_ASSETS','assets/');
// function exit_param($file){
//     return array_key_exists($file,$_REQUEST);
// }
const URL = "http://localhost:81/PHP2/hoangnvph15198_asm/";
const URL_PUBLIC = URL."public/";

date_default_timezone_set('Asia/Ho_Chi_Minh');




function get_time($time)
{
    $time_ago = strtotime($time); //chuyển đổi thời gian thành chuổi dãy số 143249323
    $current = time(); // thời gian được trả về kiêu intF
    $time_diff = $current - $time_ago;
    $seconds = $time_diff;
    $minute = round($seconds / 60); // 
    $hour = round($seconds / 3600); //60*60 
    $day = round($seconds / 86400); //24*60*60
    $week = round($seconds / 604800);  //24*60*60*7
    $moth = round($seconds / 2629440); //24*60*60*30
    $year = round($seconds / 31536000); //24*60*60*365

    if ($seconds <= 60) {
        return "vừa mới";
    } else
     if ($minute <= 60) {
        if ($minute == 1) {
            return "1 phút trước";
        } else {
            return "$minute phút trước";
        }
    } else
     if ($hour <= 24) {
        if ($hour == 1) {
            return "1 giờ trước";
        } else {
            return "$hour giờ trước";
        }
    } else
      if ($day <= 7) {
        if ($day == 1) {
            return "  hôm qua";
        } else {
            return "$day ngày trước";
        }
    } else
     if ($week <= 4.3) {
        if ($week == 1) {
            return "1 tuần trước";
        } else {
            return "$week tuần trước";
        }
    } else

     if ($moth <= 12) {
        if ($moth == 1) {
            return "1 tháng trước";
        } else {
            return "$moth tháng trước";
        }
    } else {

        if ($year == 1) {
            return "1 năm trước";
        } else {
            return "$year năm trước";
        }
    }
}
