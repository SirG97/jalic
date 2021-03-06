<?php


namespace App\Classes;


class Random{
    public static function generateId($length = 8, $type="alphanumeric"){
        $ret = "";
        for($i = 0; $i < $length; $i++){
            if(strtolower($type) == "alphanumeric"){
                $ch = mt_rand(0, 1);
                if($ch == 0){
                    $ret .= Random::ToAlphabet(mt_rand(1, 26));
                }else{
                    $ret .= mt_rand(1, 9);
                }
            }
            if(strtolower($type) == "numeric"){
                $ret .= mt_rand(1, 9);
            }
            if(strtolower($type) == "alphabetic"){
                $ret .= Random::ToAlphabet(mt_rand(1, 26));
            }
        }
        return $ret;
    }

    public static function toAlphabet($num){
        $ret = "";

        switch($num){
            case 1:
                $ret = "A";
                break;

            case 2:
                $ret = "B";
                break;

            case 3:
                $ret = "C";
                break;

            case 4:
                $ret = "D";
                break;

            case 5:
                $ret = "E";
                break;

            case 6:
                $ret = "F";
                break;

            case 7:
                $ret = "G";
                break;

            case 8:
                $ret = "H";
                break;

            case 9:
                $ret = "I";
                break;

            case 10:
                $ret = "J";
                break;

            case 11:
                $ret = "K";
                break;

            case 12:
                $ret = "L";
                break;

            case 13:
                $ret = "M";
                break;

            case 14:
                $ret = "N";
                break;

            case 15:
                $ret = "O";
                break;

            case 16:
                $ret = "P";
                break;

            case 17:
                $ret = "Q";
                break;

            case 18:
                $ret = "R";
                break;

            case 19:
                $ret = "S";
                break;

            case 20:
                $ret = "T";
                break;

            case 21:
                $ret = "U";
                break;

            case 22:
                $ret = "V";
                break;

            case 23:
                $ret = "W";
                break;

            case 24:
                $ret = "X";
                break;

            case 25:
                $ret = "Y";
                break;

            case 26:
                $ret = "Z";
                break;
        }

        return $ret;
    }
}