<?php
namespace App\ligue_de_hockey;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class Division
{   
    
    private static $name;
    private static $teams = array();


    public static function  get_teams()
    {
        return $teams;
 
    }


    public static function  set_teams($name , $myArray = []) {
        
        static::$teams = $myArray;
    
        static::$name = $name ;
    
    }

}