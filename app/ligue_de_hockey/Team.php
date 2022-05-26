<?php
namespace App\ligue_de_hockey;
 
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class Team
{   
    
    private static $division_name;
    private static $team_name;
    private static $team = array();


    public function __construct($division_name, $team_name, $myArray = array()) {
        static::$team  = $myArray;
        static::$division_name  = $division_name;
        static::$team_name  = $team_name;
     
      }


    public static function  get_rating_mean() {
        
        $sum = 0;

        $team = static::$team;

        for($i=0; $i<=20; $i++){
        $sum = $team[$i] + $sum ;
        }

        $rating_mean = $sum/21;

        return $rating_mean;
    }


    
    public static function  get_team() {
        
        $team = static::$team ;
        return $team;
    
    }


    function set_team($division_name, $team_name, $myArray = array() ) {

        static::$team  = $myArray;
     
    }



}