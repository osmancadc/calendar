<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class monthController extends Controller
{    
    public static function getDays($month){
        $year = date('y');
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }

    public static function getDayOfWeek($month){
        $year = date('y');
        return date('w',mktime(0,0,0,$month,1,$year));
    }
    public static function getName($month){
        switch ($month) {
            case 1:
                return "enero";
            case 2:
                return "febrero";
            case 3:
                return "marzo";
            case 4:
                return "abril";
            case 5:
                return "mayo";
            case 6:
                return "junio";
            case 7:
                return "julio";
            case 8:
                return "agosto";
            case 9:
                return "septiembre";
            case 10:
                return "octubre";
            case 11:
                return "noviembre";
            case 12:
                return "diciembre";
        }
    }

    public static function getHolidays(){
        return Http::get('https://filesstaticpulzo.s3-us-west-2.amazonaws.com/pulzo-dev/jsons/festivos.json');
    }

    public static function isHoliday($day,$holidays){
        foreach ($holidays as $value){
            if($value == $day)
                return true;
        }
        return false;
    }
}
