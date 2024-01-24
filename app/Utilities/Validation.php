<?php


namespace App\Utilities;


class Validation
{

    public static function is_valid_email(string $email)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            return true;
        return false;
    }

    public static function is_valid_name()
    {

    }

    public static function is_valid_first_name()
    {

    }

    public static function is_valid_mobile()
    {

    }

    public static function is_valid_password()
    {

    }
}