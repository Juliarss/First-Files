<?php

//  this function checks the email format is correct or not
//  and return true or false accordingly.
        function is_email($email)
        {
                if(!preg_match("/^[A-Za-z0-9\._\-+]+@[A-Za-z0-9_\-+]+(\.[A-Za-z0-9_\-+]+)+$/",$email))
                        return false;
                return true;
        }
// End of is_email Function

//  this function checks the given number is signed/unsigned number
//  and return true or false accordingly.
        function is_number($number)
        {
                if(!preg_match("/^\-?\+?[0-9e1-9]+$/",$number))
                        return false;
                return true;
        }
// End of is_number Function

//  this function checks the given number is unsigned number
//  and return true or false accordingly.
        function is_unsign_number($number)
        {
                if(!preg_match("/^\+?[0-9]+$/",$number))
                        return false;
                return true;
        }
// End of is_unsign_number Function

//  this function checks the given string is alphanumeric word or not
//  and return true or false accordingly.
        function is_alpha_numeric($str)
        {
                if(!preg_match("/^[A-Za-z0-9 ]+$/",$str))
                        return false;
                return true;
        }
// End of is_alpha_numeric Function

//  this function checks the given date is valid or not.
//  and return true or false accordingly.
        function is_date($d)
        {
                if(!preg_match("/^(\d){1,2}[-\/](\d){1,2}[-\/]\d{4}$/",$d,$matches))
                        return -1;//Bad Date Format
                $T = split("[-/\\]",$d);
                $MON=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
                $M = $T[0];
                $D = $T[1];
                $Y = $T[2];
                return $D>0 && ($D<=$MON[$M] ||        $D==29 && $Y%4==0 && ($Y%100!=0 || $Y%400==0));
        }
        //End of is_data function
?>