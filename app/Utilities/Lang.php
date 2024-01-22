<?php


namespace App\Utilities;


class Lang
{

    public static function convertPerToEnglish($number)
    {

        $persian = ["+", "۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
        $english = ["+", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        return str_ireplace($persian, $english, $number);
    }

    public static function  convertEngToPersian($number)
    {

        $english = ["+", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        $persian = ["+", "۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
        return str_ireplace($english, $persian, $number);
    }


    public static function  priceFormat($price)
    {

        $price = number_format($price, 0, '/', ',');
        $price = self::convertEngToPersian($price);
        return $price;

    }
}