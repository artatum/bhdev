<?php
/**
 * @file
 *
 * This file must be included when these functions are needed.
 */
function get_days_text($numday = NULL, $size = NULL) {
    $day = array();
    $day[0]=t("Sunday");
    $day[1]=t("Monday");
    $day[2]=t("Tuesday");
    $day[3]=t("Wednesday");
    $day[4]=t("Thursday");
    $day[5]=t("Friday");
    $day[6]=t("Saturday");
    if ($numday == NULL) {
        return $day;
    } 
    else {
        if (!is_null($size)) { // 3 digits
            return substr($day[$numday], 0, 3);
        } 
        else { // full word
        return $day[$numday];            
        }
    };
}
function previous_day($day_num) {
    if ($day_num == 0) {
        $previous_day = 6;
    }
    else {
        $previous_day = $day_num -1;
    }
    return $previous_day;
}

function is_valid_timeHi($time) {
    
    $hour = substr($time, 0, 2);
    $mn = substr($time, 3, 2);
    $sep = $time[2];
    if (is_numeric($hour) &&  $hour < 24 && $sep == ':' && is_numeric($mn) && $mn < 60) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function full_date_now() {
    $now = strtotime(date('Y-m-d H:i:s'));
    Return $now;
    }
    
function day_now() {
    $daynow =  format_date(strtotime(date('Y-m-d H:i:s')), 'custom', 'w');
    Return $daynow;
    }
function time_his_to_int($time_his) {
    $toto = str_replace(":", "", $time_his);
    $begin = substr($toto, 0, 4);
    return (int)$begin;
}
    