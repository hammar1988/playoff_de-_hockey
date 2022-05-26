<?php

namespace App\Http\Controllers;

use App\ligue_de_hockey\Division;
use App\ligue_de_hockey\Team;


class HomeController extends Controller
{
    private $east_probabilities = array();
    private $west_probabilities = array();
    
    public function index(){

        
        $west_data = self::west();
        $west_round0_winners=  $west_data['round0_winners'];
        $west_round0_loosers_results=  $west_data['round0_loosers_results'];
        $west_round1_winners=  $west_data['round1_winners'];
        $west_round1_loosers_results=  $west_data['round1_loosers_results'];
        $west_round2_winners=  $west_data['round2_winners'];
        $west_round2_loosers_results=  $west_data['round2_loosers_results'];

        $east_data = self::east();
        $east_round0_winners=  $east_data['round0_winners'];
        $east_round0_loosers_results=  $east_data['round0_loosers_results'];
        $east_round1_winners=  $east_data['round1_winners'];
        $east_round1_loosers_results=  $east_data['round1_loosers_results'];
        $east_round2_winners=  $east_data['round2_winners'];
        $east_round2_loosers_results= $east_data['round2_loosers_results'];


        $final_match = self::east_west();
        $final_match_winner = $final_match['winner'];

        $looser_victories_number = 0;

        if($final_match['team1_vitories_number'] != 4 ){
            $looser_victories_number = $final_match['team1_vitories_number'];
        }else{
            $looser_victories_number = $final_match['team2_vitories_number'];
        }

        $division = "";


        if ($final_match_winner[0] == "W"){
            $division = "West";
        }else{
            $division = "East"; 
        }

      
        echo "Division East:";
        echo "<br>";
        echo "Round #0:";
        echo "<br>";
        echo "Serie A vs B - Winner: " .  substr($east_round0_winners[0], 1) . " (4/".$east_round0_loosers_results[0].")" ;  
        echo "<br>";
        echo "Serie C vs D - Winner: " . substr($east_round0_winners[1], 1). " (4/".$east_round0_loosers_results[1].")" ;  
        echo "<br>";
        echo "Serie E vs F - Winner: " . substr($east_round0_winners[2], 1). " (4/".$east_round0_loosers_results[2].")" ; 
        echo "<br>";
        echo "Serie G vs H - Winner: " . substr($east_round0_winners[3], 1). " (4/".$east_round0_loosers_results[3].")" ;  
        echo "<br>";
        echo "Round #1:";
        echo "<br>";
        echo "Serie ".substr($east_round0_winners[0], 1)." vs ".substr($east_round0_winners[1], 1). " - Winner: " .  substr($east_round1_winners[0], 1). " (4/".$east_round1_loosers_results[0].")" ;  
        echo "<br>";
        echo "Serie ".substr($east_round0_winners[2], 1)." vs ".substr($east_round0_winners[3], 1). " - Winner: " .  substr($east_round1_winners[1], 1). " (4/".$east_round1_loosers_results[1].")" ;  
        echo "<br>";
        echo "Round #2:";
        echo "<br>";
        echo "Serie ".substr($east_round1_winners[0], 1)." vs ".substr($east_round1_winners[1], 1). " - Winner: " .  substr($east_round2_winners[0], 1). " (4/".$east_round2_loosers_results[0].")" ;  
        echo "<br>";
        echo "-----------------------------";
        echo "<br>";
        echo "Division West:";
        echo "<br>";
        echo "Round #0:";
        echo "<br>";
        echo "Serie A vs B - Winner: " .  substr($west_round0_winners[0], 1) . " (4/".$west_round0_loosers_results[0].")" ;  
        echo "<br>";
        echo "Serie C vs D - Winner: " . substr($west_round0_winners[1], 1). " (4/".$west_round0_loosers_results[1].")" ;  
        echo "<br>";
        echo "Serie E vs F - Winner: " . substr($west_round0_winners[2], 1). " (4/".$west_round0_loosers_results[2].")" ; 
        echo "<br>";
        echo "Serie G vs H - Winner: " . substr($west_round0_winners[3], 1). " (4/".$west_round0_loosers_results[3].")" ;  
        echo "<br>";
        echo "Round #1:";
        echo "<br>";
        echo "Serie ".substr($west_round0_winners[0], 1)." vs ".substr($west_round0_winners[1], 1). " - Winner: " .  substr($west_round1_winners[0], 1). " (4/".$west_round1_loosers_results[0].")" ;  
        echo "<br>";
        echo "Serie ".substr($west_round0_winners[2], 1)." vs ".substr($west_round0_winners[3], 1). " - Winner: " .  substr($west_round1_winners[1], 1). " (4/".$west_round1_loosers_results[1].")" ;  
        echo "<br>";
        echo "Round #2:";
        echo "<br>";
        echo "Serie ".substr($west_round1_winners[0], 1)." vs ".substr($west_round1_winners[1], 1). " - Winner: " .  substr($west_round2_winners[0], 1). " (4/".$west_round2_loosers_results[0].")" ;  
        echo "<br>";
        echo "-----------------------------";
        echo "<br>";
        echo "Final East ".substr($east_round2_winners[0], 1)." vs West ".substr($west_round2_winners[0], 1)." - Winner :" .$division." ".substr($final_match_winner, 1)." (4/".$looser_victories_number.")";
     



        echo "<br>";
        




    }

    public function west()
        {   
            $west = array("WA", "WB","WC", "WD","WE", "WF","WG", "WH");
            
            // create the divisions
            
            $west_division = new Division;  // correct
            $west_division->set_teams($west);
           
            // create teams
            $random_array = self::random_array();

            $WA = new Team ("west", "WA", $random_array);  
            $WB = new Team ("west", "WB", $random_array);  
            $WC = new Team ("west", "WC", $random_array);  
            $WD = new Team ("west", "WD", $random_array);  
            $WE = new Team ("west", "WE", $random_array);  
            $WF = new Team ("west", "WF", $random_array);  
            $WG = new Team ("west", "WG", $random_array);  
            $WH = new Team ("west", "WH", $random_array);  

            // Get the rating mean for each team 
            $WA_rating_mean = $WA->get_rating_mean();
            $WB_rating_mean = $WA->get_rating_mean();
            $WC_rating_mean = $WA->get_rating_mean();
            $WD_rating_mean = $WA->get_rating_mean();
            $WE_rating_mean = $WA->get_rating_mean();
            $WF_rating_mean = $WA->get_rating_mean();
            $WG_rating_mean = $WA->get_rating_mean();
            $WH_rating_mean = $WA->get_rating_mean();

            // Get the success probability for each team 
            $WA_success_probability = 1/$WA_rating_mean;
            $WB_success_probability = 1/$WB_rating_mean;
            $WC_success_probability = 1/$WC_rating_mean;
            $WD_success_probability = 1/$WD_rating_mean;
            $WE_success_probability = 1/$WE_rating_mean;
            $WF_success_probability = 1/$WF_rating_mean;
            $WG_success_probability = 1/$WG_rating_mean;
            $WH_success_probability = 1/$WH_rating_mean;

            $this->west_probabilities = array ($WA_success_probability, $WB_success_probability, $WC_success_probability, $WD_success_probability, $WE_success_probability, $WF_success_probability, $WG_success_probability, $WH_success_probability);

            
    
            //Round0
            $round0_WA_vs_WB_WA = 0;
            $round0_WA_vs_WB_WB = 0;
            $round0_WC_vs_WD_WC = 0;
            $round0_WC_vs_WD_WD = 0;
            $round0_WE_vs_WF_WE = 0;
            $round0_WE_vs_WF_WF = 0;
            $round0_WG_vs_WH_WG = 0;
            $round0_WG_vs_WH_WH = 0;

            // WA vs WB 
            $data = self:: match("WA", "WB",$round0_WA_vs_WB_WA, $round0_WA_vs_WB_WB, $WA_success_probability, $WB_success_probability);
            $round0_WA_vs_WB_winner = $data['winner'];
            $round0_WA_vs_WB_WA = $data['team1_vitories_number'];
            $round0_WA_vs_WB_WB = $data['team2_vitories_number'];

             // WC vs WD 
            $data = self:: match("WC", "WD",$round0_WC_vs_WD_WC, $round0_WC_vs_WD_WD, $WC_success_probability, $WD_success_probability);
            $round0_WC_vs_WD_winner = $data['winner'];
            $round0_WC_vs_WD_WC = $data['team1_vitories_number'];
            $round0_WC_vs_WD_WD = $data['team2_vitories_number'];

             // WE vs WF 
             $data = self:: match("WE", "WF",$round0_WE_vs_WF_WE, $round0_WE_vs_WF_WF, $WE_success_probability, $WF_success_probability);
             $round0_WE_vs_WF_winner = $data['winner'];
             $round0_WE_vs_WF_WE = $data['team1_vitories_number'];
             $round0_WE_vs_WF_WF = $data['team2_vitories_number'];

            // WG vs WH
            $data = self:: match("WG", "WH",$round0_WG_vs_WH_WG, $round0_WG_vs_WH_WH, $WG_success_probability, $WH_success_probability);
            $round0_WG_vs_WH_winner = $data['winner'];
            $round0_WG_vs_WH_WG = $data['team1_vitories_number'];
            $round0_WG_vs_WH_WH = $data['team2_vitories_number'];

            $round0_winners = array();
            $round0_loosers_results = array();

            if($round0_WA_vs_WB_winner && $round0_WA_vs_WB_winner=="WA"){
                array_push($round0_winners,$round0_WA_vs_WB_winner);
                array_push($round0_loosers_results,$round0_WA_vs_WB_WB);
            }
            if($round0_WA_vs_WB_winner && $round0_WA_vs_WB_winner=="WB"){
                array_push($round0_winners,$round0_WA_vs_WB_winner);
                array_push($round0_loosers_results,$round0_WA_vs_WB_WA);
            }
            if($round0_WC_vs_WD_winner && $round0_WC_vs_WD_winner=="WC"){
                array_push($round0_winners,$round0_WC_vs_WD_winner);
                array_push($round0_loosers_results,$round0_WC_vs_WD_WD);
            }
            if($round0_WC_vs_WD_winner && $round0_WC_vs_WD_winner=="WD"){
                array_push($round0_winners,$round0_WC_vs_WD_winner);
                array_push($round0_loosers_results,$round0_WC_vs_WD_WC);
            }
            if($round0_WE_vs_WF_winner && $round0_WE_vs_WF_winner=="WE"){
                array_push($round0_winners,$round0_WE_vs_WF_winner);
                array_push($round0_loosers_results,$round0_WE_vs_WF_WF);
            }
            if($round0_WE_vs_WF_winner && $round0_WE_vs_WF_winner=="WF"){
                array_push($round0_winners,$round0_WE_vs_WF_winner);
                array_push($round0_loosers_results,$round0_WE_vs_WF_WE);
            }
            if($round0_WG_vs_WH_winner && $round0_WG_vs_WH_winner=="WG"){
                array_push($round0_winners,$round0_WG_vs_WH_winner);
                array_push($round0_loosers_results,$round0_WG_vs_WH_WH);
            }
            if($round0_WG_vs_WH_winner && $round0_WG_vs_WH_winner=="WH"){
                array_push($round0_winners,$round0_WG_vs_WH_winner);
                array_push($round0_loosers_results,$round0_WG_vs_WH_WG);
            }


            //round1

            $round1_WA_vs_WC_WA = 0;
            $round1_WA_vs_WC_WC= 0;
            $round1_WA_vs_WD_WA= 0;
            $round1_WA_vs_WD_WD= 0;
            $round1_WB_vs_WC_WB = 0;
            $round1_WB_vs_WC_WC = 0;
            $round1_WB_vs_WD_WB= 0;
            $round1_WB_vs_WD_WD= 0;
            $round1_WE_vs_WH_WE = 0;
            $round1_WE_vs_WH_WH = 0;
            $round1_WE_vs_WG_WE = 0;
            $round1_WE_vs_WG_WG = 0;
            $round1_WF_vs_WH_WF = 0;
            $round1_WF_vs_WH_WH = 0;
            $round1_WF_vs_WG_WG = 0;
            $round1_WF_vs_WG_WF = 0;

            $round1_WA_vs_WC_winner ="";
            $round1_WA_vs_WD_winner ="";
            $round1_WB_vs_WC_winner ="";
            $round1_WA_vs_WD_winner ="";
            $round1_WE_vs_WH_winner ="";
            $round1_WE_vs_WG_winner ="";
            $round1_WF_vs_WH_winner ="";
            $round1_WF_vs_WG_winner ="";
            $round1_WB_vs_WD_winner ="";

        
            if($round0_winners[0] == "WA" && $round0_winners[1] == "WC" ){        
                $data = self:: match($round0_winners[0], $round0_winners[1],$round1_WA_vs_WC_WA, $round1_WA_vs_WC_WC, $WA_success_probability, $WC_success_probability);    
                $round1_WA_vs_WC_winner = $data['winner'];
                $round1_WA_vs_WC_WA = $data['team1_vitories_number'];
                $round1_WA_vs_WC_WC = $data['team2_vitories_number'];
            }
            if($round0_winners[0] == "WA" && $round0_winners[1] == "WD" ){
                $data = self:: match($round0_winners[0], $round0_winners[1],$round1_WA_vs_WD_WA, $round1_WA_vs_WD_WD, $WA_success_probability, $WD_success_probability);
                $round1_WA_vs_WD_winner = $data['winner'];
                $round1_WA_vs_WD_WA = $data['team1_vitories_number'];
                $round1_WA_vs_WD_WD = $data['team2_vitories_number'];
            }
            if($round0_winners[0] == "WB" && $round0_winners[1] == "WC" ){
                $data = self:: match($round0_winners[0], $round0_winners[1],$round1_WB_vs_WC_WB, $round1_WB_vs_WC_WC, $WB_success_probability, $WC_success_probability);
                $round1_WB_vs_WC_winner = $data['winner'];
                $round1_WB_vs_WC_WB = $data['team1_vitories_number'];
                $round1_WB_vs_WC_WC = $data['team2_vitories_number'];
            }
            if($round0_winners[0] == "WB" && $round0_winners[1] == "WD" ){
                $data = self:: match($round0_winners[0], $round0_winners[1],$round1_WB_vs_WD_WB, $round1_WB_vs_WD_WD, $WB_success_probability, $WD_success_probability);
                $round1_WB_vs_WD_winner = $data['winner'];
                $round1_WB_vs_WD_WB = $data['team1_vitories_number'];
                $round1_WB_vs_WD_WD = $data['team2_vitories_number'];
            }
            if($round0_winners[2] == "WE" && $round0_winners[3] == "WH" ){
                $data = self:: match($round0_winners[2], $round0_winners[3],$round1_WE_vs_WH_WE, $round1_WE_vs_WH_WH, $WE_success_probability, $WH_success_probability);
                $round1_WE_vs_WH_winner = $data['winner'];
                $round1_WE_vs_WH_WE = $data['team1_vitories_number'];
                $round1_WE_vs_WH_WH = $data['team2_vitories_number'];
            }
            if($round0_winners[2] == "WE" && $round0_winners[3] == "WG" ){
                $data = self:: match($round0_winners[2], $round0_winners[3],$round1_WE_vs_WG_WE, $round1_WE_vs_WG_WG, $WE_success_probability, $WG_success_probability);
                $round1_WE_vs_WG_winner = $data['winner'];
                $round1_WE_vs_WG_WE = $data['team1_vitories_number'];
                $round1_WE_vs_WG_WG = $data['team2_vitories_number'];
            }
            if($round0_winners[2] == "WF" && $round0_winners[3] == "WH" ){
                $data = self:: match($round0_winners[2], $round0_winners[3],$round1_WF_vs_WH_WF, $round1_WF_vs_WH_WH, $WF_success_probability, $WH_success_probability);
                $round1_WF_vs_WH_winner = $data['winner'];
                $round1_WF_vs_WH_WF = $data['team1_vitories_number'];
                $round1_WF_vs_WH_WH = $data['team2_vitories_number'];
            }
            if($round0_winners[2] == "WF" && $round0_winners[3] == "WG" ){
                $data = self:: match($round0_winners[2], $round0_winners[3],$round1_WF_vs_WG_WF, $round1_WF_vs_WG_WG, $WF_success_probability, $WG_success_probability);
                $round1_WF_vs_WG_winner = $data['winner'];
                $round1_WF_vs_WG_WF = $data['team1_vitories_number'];
                $round1_WF_vs_WG_WG = $data['team2_vitories_number'];
            }

            $round1_winners = array();
            $round1_loosers_results = array();

            if($round1_WA_vs_WC_winner !="" && $round1_WA_vs_WC_winner=="WA"){
                array_push($round1_winners,$round1_WA_vs_WC_winner);
                array_push($round1_loosers_results,$round1_WA_vs_WC_WC);
            }
            if($round1_WA_vs_WC_winner!="" && $round1_WA_vs_WC_winner=="WC"){
                array_push($round1_winners,$round1_WA_vs_WC_winner);
                array_push($round1_loosers_results,$round1_WA_vs_WC_WA);
            }
            if($round1_WA_vs_WD_winner!="" && $round1_WA_vs_WD_winner=="WA"){
                array_push($round1_winners,$round1_WA_vs_WD_winner);
                array_push($round1_loosers_results,$round1_WA_vs_WD_WD);
            }
            if($round1_WA_vs_WD_winner!="" && $round1_WA_vs_WD_winner=="WD"){
                array_push($round1_winners,$round1_WA_vs_WD_winner);
                array_push($round1_loosers_results,$round1_WA_vs_WD_WA);
            }
            if($round1_WB_vs_WC_winner!="" && $round1_WB_vs_WC_winner=="WB"){
                array_push($round1_winners,$round1_WB_vs_WC_winner);
                array_push($round1_loosers_results,$round1_WB_vs_WC_WC);
            }
            if($round1_WB_vs_WC_winner!="" && $round1_WB_vs_WC_winner=="WC"){
                array_push($round1_winners,$round1_WB_vs_WC_winner);
                array_push($round1_loosers_results,$round1_WB_vs_WC_WB);
            }
            if($round1_WB_vs_WD_winner!="" && $round1_WB_vs_WD_winner=="WB"){
                array_push($round1_winners,$round1_WB_vs_WD_winner);
                array_push($round1_loosers_results,$round1_WB_vs_WD_WD);
            }
            if($round1_WB_vs_WD_winner!="" && $round1_WB_vs_WD_winner=="WD"){
                array_push($round1_winners,$round1_WB_vs_WD_winner);
                array_push($round1_loosers_results,$round1_WB_vs_WD_WB);
            }
            if($round1_WE_vs_WH_winner!="" && $round1_WE_vs_WH_winner=="WE"){
                array_push($round1_winners,$round1_WE_vs_WH_winner);
                array_push($round1_loosers_results,$round1_WE_vs_WH_WH);
            }
            if($round1_WE_vs_WH_winner!="" && $round1_WE_vs_WH_winner=="WH"){
                array_push($round1_winners,$round1_WE_vs_WH_winner);
                array_push($round1_loosers_results,$round1_WE_vs_WH_WE);
            }
            if($round1_WE_vs_WG_winner!="" && $round1_WE_vs_WG_winner=="WG"){
                array_push($round1_winners,$round1_WE_vs_WG_winner);
                array_push($round1_loosers_results,$round1_WE_vs_WG_WE);
            }
            if($round1_WE_vs_WG_winner!="" && $round1_WE_vs_WG_winner=="WE"){
                array_push($round1_winners,$round1_WE_vs_WG_winner);
                array_push($round1_loosers_results,$round1_WE_vs_WG_WG);
            }
            if($round1_WF_vs_WH_winner!="" && $round1_WF_vs_WH_winner=="WF"){
                array_push($round1_winners,$round1_WF_vs_WH_winner);
                array_push($round1_loosers_results,$round1_WF_vs_WH_WH);
            }
            if($round1_WF_vs_WH_winner!="" && $round1_WF_vs_WH_winner=="WH"){
                array_push($round1_winners,$round1_WF_vs_WH_winner);
                array_push($round1_loosers_results,$round1_WF_vs_WH_WF);
            }
            if($round1_WF_vs_WG_winner!="" && $round1_WF_vs_WG_winner=="WF"){
                array_push($round1_winners,$round1_WF_vs_WG_winner);
                array_push($round1_loosers_results,$round1_WF_vs_WG_WG);
            }
            if($round1_WF_vs_WG_winner!="" && $round1_WF_vs_WG_winner=="WG"){
                array_push($round1_winners,$round1_WF_vs_WG_winner);
                array_push($round1_loosers_results,$round1_WF_vs_WG_WF);
            }



           //Round2

            $round2_WA_vs_WE_WA = 0;
            $round2_WA_vs_WE_WE= 0;
            $round2_WA_vs_WF_WA= 0;
            $round2_WA_vs_WF_WF= 0;
            $round2_WA_vs_WG_WA = 0;
            $round2_WA_vs_WG_WG = 0;
            $round2_WA_vs_WH_WA= 0;
            $round2_WA_vs_WH_WH= 0;
            $round2_WB_vs_WE_WB = 0;
            $round2_WB_vs_WE_WE= 0;
            $round2_WB_vs_WF_WB= 0;
            $round2_WB_vs_WF_WF= 0;
            $round2_WB_vs_WG_WB = 0;
            $round2_WB_vs_WG_WG = 0;
            $round2_WB_vs_WH_WB= 0;
            $round2_WB_vs_WH_WH= 0;
            $round2_WC_vs_WE_WC = 0;
            $round2_WC_vs_WE_WE= 0;
            $round2_WC_vs_WF_WC= 0;
            $round2_WC_vs_WF_WF= 0;
            $round2_WC_vs_WG_WC = 0;
            $round2_WC_vs_WG_WG = 0;
            $round2_WC_vs_WH_WC= 0;
            $round2_WC_vs_WH_WH= 0;
            $round2_WD_vs_WE_WD = 0;
            $round2_WD_vs_WE_WE= 0;
            $round2_WD_vs_WF_WD= 0;
            $round2_WD_vs_WF_WF= 0;
            $round2_WD_vs_WG_WD = 0;
            $round2_WD_vs_WG_WG = 0;
            $round2_WD_vs_WH_WD= 0;
            $round2_WD_vs_WH_WH= 0;



            $round2_WA_vs_WE_winner ="";
            $round2_WA_vs_WF_winner ="";
            $round2_WA_vs_WG_winner ="";
            $round2_WA_vs_WH_winner ="";
            $round2_WB_vs_WE_winner ="";
            $round2_WB_vs_WF_winner ="";
            $round2_WB_vs_WG_winner ="";
            $round2_WB_vs_WH_winner ="";
            $round2_WC_vs_WE_winner ="";
            $round2_WC_vs_WF_winner ="";
            $round2_WC_vs_WG_winner ="";
            $round2_WC_vs_WH_winner ="";
            $round2_WD_vs_WE_winner ="";
            $round2_WD_vs_WF_winner ="";
            $round2_WD_vs_WG_winner ="";
            $round2_WD_vs_WH_winner ="";


            if($round1_winners[0] == "WA" && $round1_winners[1] == "WE" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WA_vs_WE_WA, $round2_WA_vs_WE_WE, $WA_success_probability, $WE_success_probability);
                $round2_WA_vs_WE_winner = $data['winner'];
                $round2_WA_vs_WE_WA = $data['team1_vitories_number'];
                $round2_WA_vs_WE_WE = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WA" && $round1_winners[1] == "WF" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WA_vs_WF_WA, $round2_WA_vs_WF_WF, $WA_success_probability, $WF_success_probability);
                $round2_WA_vs_WF_winner = $data['winner'];
                $round2_WA_vs_WF_WA = $data['team1_vitories_number'];
                $round2_WA_vs_WF_WE = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WA" && $round1_winners[1] == "WG" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WA_vs_WG_WA, $round2_WA_vs_WG_WG, $WA_success_probability, $WG_success_probability);
                $round2_WA_vs_WG_winner = $data['winner'];
                $round2_WA_vs_WG_WA = $data['team1_vitories_number'];
                $round2_WA_vs_WG_WG = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WA" && $round1_winners[1] == "WH" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WA_vs_WH_WA, $round2_WA_vs_WH_WH, $WA_success_probability, $WH_success_probability);
                $round2_WA_vs_WH_winner = $data['winner'];
                $round2_WA_vs_WH_WA = $data['team1_vitories_number'];
                $round2_WA_vs_WH_WH = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WB" && $round1_winners[1] == "WE" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WB_vs_WE_WB, $round2_WB_vs_WE_WE, $WB_success_probability, $WE_success_probability);
                $round2_WB_vs_WE_winner = $data['winner'];
                $round2_WB_vs_WE_WB = $data['team1_vitories_number'];
                $round2_WB_vs_WE_WE = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WB" && $round1_winners[1] == "WF" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WB_vs_WF_WB, $round2_WB_vs_WF_WF, $WB_success_probability, $WF_success_probability);
                $round2_WB_vs_WF_winner = $data['winner'];
                $round2_WB_vs_WF_WB = $data['team1_vitories_number'];
                $round2_WB_vs_WF_WF = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WB" && $round1_winners[1] == "WG" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WB_vs_WG_WB, $round2_WB_vs_WG_WG, $WB_success_probability, $WG_success_probability);
                $round2_WB_vs_WG_winner = $data['winner'];
                $round2_WB_vs_WG_WB = $data['team1_vitories_number'];
                $round2_WB_vs_WG_WG = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WB" && $round1_winners[1] == "WH" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WB_vs_WH_WB, $round2_WB_vs_WH_WH, $WB_success_probability, $WH_success_probability);
                $round2_WB_vs_WH_winner = $data['winner'];
                $round2_WB_vs_WH_WB = $data['team1_vitories_number'];
                $round2_WB_vs_WH_WH = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WC" && $round1_winners[1] == "WE" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WC_vs_WE_WC, $round2_WC_vs_WE_WE, $WC_success_probability, $WE_success_probability);
                $round2_WC_vs_WE_winner = $data['winner'];
                $round2_WC_vs_WE_WC = $data['team1_vitories_number'];
                $round2_WC_vs_WE_WE = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WC" && $round1_winners[1] == "WF" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WC_vs_WF_WC, $round2_WC_vs_WF_WF, $WC_success_probability, $WF_success_probability);
                $round2_WC_vs_WF_winner = $data['winner'];
                $round2_WC_vs_WF_WC = $data['team1_vitories_number'];
                $round2_WC_vs_WF_WF = $data['team2_vitories_number'];
            }

            if($round1_winners[0] == "WC" && $round1_winners[1] == "WG" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WC_vs_WG_WC, $round2_WC_vs_WG_WG, $WC_success_probability, $WG_success_probability);
                $round2_WC_vs_WG_winner = $data['winner'];
                $round2_WC_vs_WG_WC = $data['team1_vitories_number'];
                $round2_WC_vs_WG_WG = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WC" && $round1_winners[1] == "WH" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WC_vs_WH_WC, $round2_WC_vs_WH_WH, $WC_success_probability, $WH_success_probability);
                $round2_WC_vs_WH_winner = $data['winner'];
                $round2_WC_vs_WH_WC = $data['team1_vitories_number'];
                $round2_WC_vs_WH_WH = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WD" && $round1_winners[1] == "WE" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WD_vs_WE_WD, $round2_WD_vs_WE_WE, $WD_success_probability, $WE_success_probability);
                $round2_WD_vs_WE_winner = $data['winner'];
                $round2_WD_vs_WE_WD = $data['team1_vitories_number'];
                $round2_WD_vs_WE_WE = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WD" && $round1_winners[1] == "WF" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WD_vs_WF_WD, $round2_WD_vs_WF_WF, $WD_success_probability, $WF_success_probability);
                $round2_WD_vs_WF_winner = $data['winner'];
                $round2_WD_vs_WF_WD = $data['team1_vitories_number'];
                $round2_WD_vs_WF_WF = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WD" && $round1_winners[1] == "WG" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WD_vs_WG_WD, $round2_WD_vs_WG_WG, $WD_success_probability, $WG_success_probability);
                $round2_WD_vs_WG_winner = $data['winner'];
                $round2_WD_vs_WG_WD = $data['team1_vitories_number'];
                $round2_WD_vs_WG_WG = $data['team2_vitories_number'];
            }
            if($round1_winners[0] == "WD" && $round1_winners[1] == "WH" ){
                $data = self:: match($round1_winners[0], $round1_winners[1],$round2_WD_vs_WH_WD, $round2_WD_vs_WH_WH, $WD_success_probability, $WH_success_probability);
                $round2_WD_vs_WH_winner = $data['winner'];
                $round2_WD_vs_WH_WD = $data['team1_vitories_number'];
                $round2_WD_vs_WH_WH = $data['team2_vitories_number'];
            }


            $round2_winners = array();
            $round2_loosers_results = array();

            if($round2_WA_vs_WE_winner !="" && $round2_WA_vs_WE_winner=="WA"){
                array_push($round2_winners,$round2_WA_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WE_WE);
            }
            if($round2_WA_vs_WE_winner !="" && $round2_WA_vs_WE_winner=="WE"){
                array_push($round2_winners,$round2_WA_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WE_WA);
            }
            if($round2_WA_vs_WF_winner !="" && $round2_WA_vs_WF_winner=="WA"){
                array_push($round2_winners,$round2_WA_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WF_WF);
            }
            if($round2_WA_vs_WF_winner !="" && $round2_WA_vs_WF_winner=="WF"){
                array_push($round2_winners,$round2_WA_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WF_WA);
            }
            if($round2_WA_vs_WG_winner !="" && $round2_WA_vs_WG_winner=="WA"){
                array_push($round2_winners,$round2_WA_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WG_WG);
            }
            if($round2_WA_vs_WG_winner !="" && $round2_WA_vs_WG_winner=="WG"){
                array_push($round2_winners,$round2_WA_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WG_WA);
            }
            if($round2_WA_vs_WH_winner !="" && $round2_WA_vs_WH_winner=="WA"){
                array_push($round2_winners,$round2_WA_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WH_WH);
            }
            if($round2_WA_vs_WH_winner !="" && $round2_WA_vs_WH_winner=="WH"){
                array_push($round2_winners,$round2_WA_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WA_vs_WH_WA);
            }
            if($round2_WB_vs_WE_winner !="" && $round2_WB_vs_WE_winner=="WB"){
                array_push($round2_winners,$round2_WB_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WE_WE);
            }
            if($round2_WB_vs_WE_winner !="" && $round2_WB_vs_WE_winner=="WE"){
                array_push($round2_winners,$round2_WB_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WE_WB);
            }
            if($round2_WB_vs_WF_winner !="" && $round2_WB_vs_WF_winner=="WB"){
                array_push($round2_winners,$round2_WB_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WF_WF);
            }
            
            if($round2_WB_vs_WF_winner !="" && $round2_WB_vs_WF_winner=="WF"){
                array_push($round2_winners,$round2_WB_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WF_WB);
            }
            if($round2_WB_vs_WG_winner !="" && $round2_WB_vs_WG_winner=="WB"){
                array_push($round2_winners,$round2_WB_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WG_WG);
            }
            if($round2_WB_vs_WG_winner !="" && $round2_WB_vs_WG_winner=="WG"){
                array_push($round2_winners,$round2_WB_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WG_WB);
            }
            if($round2_WB_vs_WH_winner !="" && $round2_WB_vs_WH_winner=="WB"){
                array_push($round2_winners,$round2_WB_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WH_WH);
            }
            if($round2_WB_vs_WH_winner !="" && $round2_WB_vs_WH_winner=="WH"){
                array_push($round2_winners,$round2_WB_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WB_vs_WH_WB);
            }
            if($round2_WC_vs_WE_winner !="" && $round2_WC_vs_WE_winner=="WC"){
                array_push($round2_winners,$round2_WC_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WE_WE);
            }
            if($round2_WC_vs_WE_winner !="" && $round2_WC_vs_WE_winner=="WE"){
                array_push($round2_winners,$round2_WC_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WE_WC);
            }
            if($round2_WC_vs_WF_winner !="" && $round2_WC_vs_WF_winner=="WC"){
                array_push($round2_winners,$round2_WC_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WF_WF);
            }
            if($round2_WC_vs_WF_winner !="" && $round2_WC_vs_WF_winner=="WF"){
                array_push($round2_winners,$round2_WC_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WF_WC);
            }
            if($round2_WC_vs_WG_winner !="" && $round2_WC_vs_WG_winner=="WC"){
                array_push($round2_winners,$round2_WC_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WG_WG);
            }
            if($round2_WC_vs_WG_winner !="" && $round2_WC_vs_WG_winner=="WG"){
                array_push($round2_winners,$round2_WC_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WG_WC);
            }
            if($round2_WC_vs_WH_winner !="" && $round2_WC_vs_WH_winner=="WC"){
                array_push($round2_winners,$round2_WC_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WH_WH);
            }
            if($round2_WC_vs_WH_winner !="" && $round2_WC_vs_WH_winner=="WH"){
                array_push($round2_winners,$round2_WC_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WC_vs_WH_WC);
            }
            if($round2_WD_vs_WE_winner !="" && $round2_WD_vs_WE_winner=="WD"){
                array_push($round2_winners,$round2_WD_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WE_WE);
            }
            if($round2_WD_vs_WE_winner !="" && $round2_WD_vs_WE_winner=="WE"){
                array_push($round2_winners,$round2_WD_vs_WE_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WE_WD);
            }
            if($round2_WD_vs_WF_winner !="" && $round2_WD_vs_WF_winner=="WD"){
                array_push($round2_winners,$round2_WD_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WF_WF);
            }
            if($round2_WD_vs_WF_winner !="" && $round2_WD_vs_WF_winner=="WF"){
                array_push($round2_winners,$round2_WD_vs_WF_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WF_WD);
            }
            if($round2_WD_vs_WG_winner !="" && $round2_WD_vs_WG_winner=="WD"){
                array_push($round2_winners,$round2_WD_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WG_WG);
            }
            if($round2_WD_vs_WG_winner !="" && $round2_WD_vs_WG_winner=="WG"){
                array_push($round2_winners,$round2_WD_vs_WG_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WG_WD);
            }
            if($round2_WD_vs_WH_winner !="" && $round2_WD_vs_WH_winner=="WD"){
                array_push($round2_winners,$round2_WD_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WH_WH);
            }
            if($round2_WD_vs_WH_winner !="" && $round2_WD_vs_WH_winner=="WH"){
                array_push($round2_winners,$round2_WD_vs_WH_winner);
                array_push($round2_loosers_results,$round2_WD_vs_WH_WD);
            }

            $data = array (
              "round0_winners" => $round0_winners,
              "round0_loosers_results" => $round0_loosers_results,
              "round1_winners" => $round1_winners,
              "round1_loosers_results" => $round1_loosers_results,
              "round2_winners" => $round2_winners,
              "round2_loosers_results" => $round2_loosers_results,
            );

            return $data;
            
}



    public function East(){
        $east = array("EA", "EB","EC", "ED","EE", "EF","EG", "EH");
            
        // create the divisions
        $east_division = new Division;  // correct
        $east_division->set_teams($east);


        // create teams
        $random_array = self::random_array();
        $EA = new Team ("east", "EA", $random_array);  
        $EB = new Team ("east", "EB", $random_array);  
        $EC = new Team ("east", "EC", $random_array);  
        $ED = new Team ("east", "ED", $random_array);  
        $EE = new Team ("east", "EE", $random_array);  
        $EF = new Team ("east", "EF", $random_array);  
        $EG = new Team ("east", "EG", $random_array);  
        $EH = new Team ("east", "EH", $random_array);  


        // Get the rating mean for each team 
        $EA_rating_mean = $EA->get_rating_mean();
        $EB_rating_mean = $EA->get_rating_mean();
        $EC_rating_mean = $EA->get_rating_mean();
        $ED_rating_mean = $EA->get_rating_mean();
        $EE_rating_mean = $EA->get_rating_mean();
        $EF_rating_mean = $EA->get_rating_mean();
        $EG_rating_mean = $EA->get_rating_mean();
        $EH_rating_mean = $EA->get_rating_mean();

    
        // Get the success probability for each team 
        $EA_success_probability = 1/$EA_rating_mean;
        $EB_success_probability = 1/$EB_rating_mean;
        $EC_success_probability = 1/$EC_rating_mean;
        $ED_success_probability = 1/$ED_rating_mean;
        $EE_success_probability = 1/$EE_rating_mean;
        $EF_success_probability = 1/$EF_rating_mean;
        $EG_success_probability = 1/$EG_rating_mean;
        $EH_success_probability = 1/$EH_rating_mean;

        $this->east_probabilities = array ($EA_success_probability, $EB_success_probability, $EC_success_probability, $ED_success_probability, $EE_success_probability, $EF_success_probability, $EG_success_probability, $EH_success_probability);
        

        //Round0
        $round0_EA_vs_EB_EA = 0;
        $round0_EA_vs_EB_EB = 0;
        $round0_EC_vs_ED_EC = 0;
        $round0_EC_vs_ED_ED = 0;
        $round0_EE_vs_EF_EE = 0;
        $round0_EE_vs_EF_EF = 0;
        $round0_EG_vs_EH_EG = 0;
        $round0_EG_vs_EH_EH = 0;


        // EA vs EB 
        $data = self:: match("EA", "EB",$round0_EA_vs_EB_EA, $round0_EA_vs_EB_EB, $EA_success_probability, $EB_success_probability);
        $round0_EA_vs_EB_winner = $data['winner'];
        $round0_EA_vs_EB_EA = $data['team1_vitories_number'];
        $round0_EA_vs_EB_EB = $data['team2_vitories_number'];


         // EC vs ED 
        $data = self:: match("EC", "ED",$round0_EC_vs_ED_EC, $round0_EC_vs_ED_ED, $EC_success_probability, $ED_success_probability);
        $round0_EC_vs_ED_winner = $data['winner'];
        $round0_EC_vs_ED_EC = $data['team1_vitories_number'];
        $round0_EC_vs_ED_ED = $data['team2_vitories_number'];


         // EE vs EF 
         $data = self:: match("EE", "EF",$round0_EE_vs_EF_EE, $round0_EE_vs_EF_EF, $EE_success_probability, $EF_success_probability);
         $round0_EE_vs_EF_winner = $data['winner'];
         $round0_EE_vs_EF_EE = $data['team1_vitories_number'];
         $round0_EE_vs_EF_EF = $data['team2_vitories_number'];

        // EG vs EH
        $data = self:: match("EG", "EH",$round0_EG_vs_EH_EG, $round0_EG_vs_EH_EH, $EG_success_probability, $EH_success_probability);
        $round0_EG_vs_EH_winner = $data['winner'];
        $round0_EG_vs_EH_EG = $data['team1_vitories_number'];
        $round0_EG_vs_EH_EH = $data['team2_vitories_number'];
        

        $round0_winners = array();
        $round0_loosers_results = array();

        if($round0_EA_vs_EB_winner && $round0_EA_vs_EB_winner=="EA"){
            array_push($round0_winners,$round0_EA_vs_EB_winner);
            array_push($round0_loosers_results,$round0_EA_vs_EB_EB);
        }
        
        if($round0_EA_vs_EB_winner && $round0_EA_vs_EB_winner=="EB"){
            array_push($round0_winners,$round0_EA_vs_EB_winner);
            array_push($round0_loosers_results,$round0_EA_vs_EB_EA);
        }
        if($round0_EC_vs_ED_winner && $round0_EC_vs_ED_winner=="EC"){
            array_push($round0_winners,$round0_EC_vs_ED_winner);
            array_push($round0_loosers_results,$round0_EC_vs_ED_ED);
        }
        if($round0_EC_vs_ED_winner && $round0_EC_vs_ED_winner=="ED"){
            array_push($round0_winners,$round0_EC_vs_ED_winner);
            array_push($round0_loosers_results,$round0_EC_vs_ED_EC);
        }
        if($round0_EE_vs_EF_winner && $round0_EE_vs_EF_winner=="EE"){
            array_push($round0_winners,$round0_EE_vs_EF_winner);
            array_push($round0_loosers_results,$round0_EE_vs_EF_EF);
        }
        if($round0_EE_vs_EF_winner && $round0_EE_vs_EF_winner=="EF"){
            array_push($round0_winners,$round0_EE_vs_EF_winner);
            array_push($round0_loosers_results,$round0_EE_vs_EF_EE);
        }
        if($round0_EG_vs_EH_winner && $round0_EG_vs_EH_winner=="EG"){
            array_push($round0_winners,$round0_EG_vs_EH_winner);
            array_push($round0_loosers_results,$round0_EG_vs_EH_EH);
        }
        if($round0_EG_vs_EH_winner && $round0_EG_vs_EH_winner=="EH"){
            array_push($round0_winners,$round0_EG_vs_EH_winner);
            array_push($round0_loosers_results,$round0_EG_vs_EH_EG);
        }


        //round1
        $round1_EA_vs_EC_EA = 0;
        $round1_EA_vs_EC_EC= 0;
        $round1_EA_vs_ED_EA= 0;
        $round1_EA_vs_ED_ED= 0;
        $round1_EB_vs_EC_EB = 0;
        $round1_EB_vs_EC_EC = 0;
        $round1_EB_vs_ED_EB= 0;
        $round1_EB_vs_ED_ED= 0;
        $round1_EE_vs_EH_EE = 0;
        $round1_EE_vs_EH_EH = 0;
        $round1_EE_vs_EG_EE = 0;
        $round1_EE_vs_EG_EG = 0;
        $round1_EF_vs_EH_EF = 0;
        $round1_EF_vs_EH_EH = 0;
        $round1_EF_vs_EG_EG = 0;
        $round1_EF_vs_EG_EF = 0;

        $round1_EA_vs_EC_winner ="";
        $round1_EA_vs_ED_winner ="";
        $round1_EB_vs_EC_winner ="";
        $round1_EA_vs_ED_winner ="";
        $round1_EE_vs_EH_winner ="";
        $round1_EE_vs_EG_winner ="";
        $round1_EF_vs_EH_winner ="";
        $round1_EF_vs_EG_winner ="";
        $round1_EB_vs_ED_winner ="";

    
        if($round0_winners[0] == "EA" && $round0_winners[1] == "EC" ){        
            $data = self:: match($round0_winners[0], $round0_winners[1],$round1_EA_vs_EC_EA, $round1_EA_vs_EC_EC, $EA_success_probability, $EC_success_probability);    
            $round1_EA_vs_EC_winner = $data['winner'];
            $round1_EA_vs_EC_EA = $data['team1_vitories_number'];
            $round1_EA_vs_EC_EC = $data['team2_vitories_number'];
        }

        if($round0_winners[0] == "EA" && $round0_winners[1] == "ED" ){
            $data = self:: match($round0_winners[0], $round0_winners[1],$round1_EA_vs_ED_EA, $round1_EA_vs_ED_ED, $EA_success_probability, $ED_success_probability);
            $round1_EA_vs_ED_winner = $data['winner'];
            $round1_EA_vs_ED_EA = $data['team1_vitories_number'];
            $round1_EA_vs_ED_ED = $data['team2_vitories_number'];
        }

        if($round0_winners[0] == "EB" && $round0_winners[1] == "EC" ){
            $data = self:: match($round0_winners[0], $round0_winners[1],$round1_EB_vs_EC_EB, $round1_EB_vs_EC_EC, $EB_success_probability, $EC_success_probability);
            $round1_EB_vs_EC_winner = $data['winner'];
            $round1_EB_vs_EC_EB = $data['team1_vitories_number'];
            $round1_EB_vs_EC_EC = $data['team2_vitories_number'];
        }

        if($round0_winners[0] == "EB" && $round0_winners[1] == "ED" ){
            $data = self:: match($round0_winners[0], $round0_winners[1],$round1_EB_vs_ED_EB, $round1_EB_vs_ED_ED, $EB_success_probability, $ED_success_probability);
            $round1_EB_vs_ED_winner = $data['winner'];
            $round1_EB_vs_ED_EB = $data['team1_vitories_number'];
            $round1_EB_vs_ED_ED = $data['team2_vitories_number'];
        }

        if($round0_winners[2] == "EE" && $round0_winners[3] == "EH" ){
            $data = self:: match($round0_winners[2], $round0_winners[3],$round1_EE_vs_EH_EE, $round1_EE_vs_EH_EH, $EE_success_probability, $EH_success_probability);
            $round1_EE_vs_EH_winner = $data['winner'];
            $round1_EE_vs_EH_EE = $data['team1_vitories_number'];
            $round1_EE_vs_EH_EH = $data['team2_vitories_number'];
        }
        if($round0_winners[2] == "EE" && $round0_winners[3] == "EG" ){
            $data = self:: match($round0_winners[2], $round0_winners[3],$round1_EE_vs_EG_EE, $round1_EE_vs_EG_EG, $EE_success_probability, $EG_success_probability);
            $round1_EE_vs_EG_winner = $data['winner'];
            $round1_EE_vs_EG_EE = $data['team1_vitories_number'];
            $round1_EE_vs_EG_EG = $data['team2_vitories_number'];
        }
        if($round0_winners[2] == "EF" && $round0_winners[3] == "EH" ){
            $data = self:: match($round0_winners[2], $round0_winners[3],$round1_EF_vs_EH_EF, $round1_EF_vs_EH_EH, $EF_success_probability, $EH_success_probability);
            $round1_EF_vs_EH_winner = $data['winner'];
            $round1_EF_vs_EH_EF = $data['team1_vitories_number'];
            $round1_EF_vs_EH_EH = $data['team2_vitories_number'];
        }
        if($round0_winners[2] == "EF" && $round0_winners[3] == "EG" ){
            $data = self:: match($round0_winners[2], $round0_winners[3],$round1_EF_vs_EG_EF, $round1_EF_vs_EG_EG, $EF_success_probability, $EG_success_probability);
            $round1_EF_vs_EG_winner = $data['winner'];
            $round1_EF_vs_EG_EF = $data['team1_vitories_number'];
            $round1_EF_vs_EG_EG = $data['team2_vitories_number'];
        }


        $round1_winners = array();
        $round1_loosers_results = array();

        if($round1_EA_vs_EC_winner !="" && $round1_EA_vs_EC_winner=="EA"){
            array_push($round1_winners,$round1_EA_vs_EC_winner);
            array_push($round1_loosers_results,$round1_EA_vs_EC_EC);
        }
        
        if($round1_EA_vs_EC_winner!="" && $round1_EA_vs_EC_winner=="EC"){
            array_push($round1_winners,$round1_EA_vs_EC_winner);
            array_push($round1_loosers_results,$round1_EA_vs_EC_EA);
        }

        if($round1_EA_vs_ED_winner!="" && $round1_EA_vs_ED_winner=="EA"){
            array_push($round1_winners,$round1_EA_vs_ED_winner);
            array_push($round1_loosers_results,$round1_EA_vs_ED_ED);
        }
        
        if($round1_EA_vs_ED_winner!="" && $round1_EA_vs_ED_winner=="ED"){
            array_push($round1_winners,$round1_EA_vs_ED_winner);
            array_push($round1_loosers_results,$round1_EA_vs_ED_EA);
        }

        if($round1_EB_vs_EC_winner!="" && $round1_EB_vs_EC_winner=="EB"){
            array_push($round1_winners,$round1_EB_vs_EC_winner);
            array_push($round1_loosers_results,$round1_EB_vs_EC_EC);
        }
        
        if($round1_EB_vs_EC_winner!="" && $round1_EB_vs_EC_winner=="EC"){
            array_push($round1_winners,$round1_EB_vs_EC_winner);
            array_push($round1_loosers_results,$round1_EB_vs_EC_EB);
        }

        if($round1_EB_vs_ED_winner!="" && $round1_EB_vs_ED_winner=="EB"){
            array_push($round1_winners,$round1_EB_vs_ED_winner);
            array_push($round1_loosers_results,$round1_EB_vs_ED_ED);
        }
        
        if($round1_EB_vs_ED_winner!="" && $round1_EB_vs_ED_winner=="ED"){
            array_push($round1_winners,$round1_EB_vs_ED_winner);
            array_push($round1_loosers_results,$round1_EB_vs_ED_EB);
        }

        if($round1_EE_vs_EH_winner!="" && $round1_EE_vs_EH_winner=="EE"){
            array_push($round1_winners,$round1_EE_vs_EH_winner);
            array_push($round1_loosers_results,$round1_EE_vs_EH_EH);
        }
        
        if($round1_EE_vs_EH_winner!="" && $round1_EE_vs_EH_winner=="EH"){
            array_push($round1_winners,$round1_EE_vs_EH_winner);
            array_push($round1_loosers_results,$round1_EE_vs_EH_EE);
        }

        if($round1_EE_vs_EG_winner!="" && $round1_EE_vs_EG_winner=="EG"){
            array_push($round1_winners,$round1_EE_vs_EG_winner);
            array_push($round1_loosers_results,$round1_EE_vs_EG_EE);
        }
        
        if($round1_EE_vs_EG_winner!="" && $round1_EE_vs_EG_winner=="EE"){
            array_push($round1_winners,$round1_EE_vs_EG_winner);
            array_push($round1_loosers_results,$round1_EE_vs_EG_EG);
        }
        
        if($round1_EF_vs_EH_winner!="" && $round1_EF_vs_EH_winner=="EF"){
            array_push($round1_winners,$round1_EF_vs_EH_winner);
            array_push($round1_loosers_results,$round1_EF_vs_EH_EH);
        }
        
        if($round1_EF_vs_EH_winner!="" && $round1_EF_vs_EH_winner=="EH"){
            array_push($round1_winners,$round1_EF_vs_EH_winner);
            array_push($round1_loosers_results,$round1_EF_vs_EH_EF);
        }

        if($round1_EF_vs_EG_winner!="" && $round1_EF_vs_EG_winner=="EF"){
            array_push($round1_winners,$round1_EF_vs_EG_winner);
            array_push($round1_loosers_results,$round1_EF_vs_EG_EG);
        }

        if($round1_EF_vs_EG_winner!="" && $round1_EF_vs_EG_winner=="EG"){
            array_push($round1_winners,$round1_EF_vs_EG_winner);
            array_push($round1_loosers_results,$round1_EF_vs_EG_EF);
        }



       //Round2

        $round2_EA_vs_EE_EA = 0;
        $round2_EA_vs_EE_EE= 0;
        $round2_EA_vs_EF_EA= 0;
        $round2_EA_vs_EF_EF= 0;
        $round2_EA_vs_EG_EA = 0;
        $round2_EA_vs_EG_EG = 0;
        $round2_EA_vs_EH_EA= 0;
        $round2_EA_vs_EH_EH= 0;
        $round2_EB_vs_EE_EB = 0;
        $round2_EB_vs_EE_EE= 0;
        $round2_EB_vs_EF_EB= 0;
        $round2_EB_vs_EF_EF= 0;
        $round2_EB_vs_EG_EB = 0;
        $round2_EB_vs_EG_EG = 0;
        $round2_EB_vs_EH_EB= 0;
        $round2_EB_vs_EH_EH= 0;
        $round2_EC_vs_EE_EC = 0;
        $round2_EC_vs_EE_EE= 0;
        $round2_EC_vs_EF_EC= 0;
        $round2_EC_vs_EF_EF= 0;
        $round2_EC_vs_EG_EC = 0;
        $round2_EC_vs_EG_EG = 0;
        $round2_EC_vs_EH_EC= 0;
        $round2_EC_vs_EH_EH= 0;
        $round2_ED_vs_EE_ED = 0;
        $round2_ED_vs_EE_EE= 0;
        $round2_ED_vs_EF_ED= 0;
        $round2_ED_vs_EF_EF= 0;
        $round2_ED_vs_EG_ED = 0;
        $round2_ED_vs_EG_EG = 0;
        $round2_ED_vs_EH_ED= 0;
        $round2_ED_vs_EH_EH= 0;



        $round2_EA_vs_EE_winner ="";
        $round2_EA_vs_EF_winner ="";
        $round2_EA_vs_EG_winner ="";
        $round2_EA_vs_EH_winner ="";
        $round2_EB_vs_EE_winner ="";
        $round2_EB_vs_EF_winner ="";
        $round2_EB_vs_EG_winner ="";
        $round2_EB_vs_EH_winner ="";
        $round2_EC_vs_EE_winner ="";
        $round2_EC_vs_EF_winner ="";
        $round2_EC_vs_EG_winner ="";
        $round2_EC_vs_EH_winner ="";
        $round2_ED_vs_EE_winner ="";
        $round2_ED_vs_EF_winner ="";
        $round2_ED_vs_EG_winner ="";
        $round2_ED_vs_EH_winner ="";


        if($round1_winners[0] == "EA" && $round1_winners[1] == "EE" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EA_vs_EE_EA, $round2_EA_vs_EE_EE, $EA_success_probability, $EE_success_probability);
            $round2_EA_vs_EE_winner = $data['winner'];
            $round2_EA_vs_EE_EA = $data['team1_vitories_number'];
            $round2_EA_vs_EE_EE = $data['team2_vitories_number'];
        }
        if($round1_winners[0] == "EA" && $round1_winners[1] == "EF" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EA_vs_EF_EA, $round2_EA_vs_EF_EF, $EA_success_probability, $EF_success_probability);
            $round2_EA_vs_EF_winner = $data['winner'];
            $round2_EA_vs_EF_EA = $data['team1_vitories_number'];
            $round2_EA_vs_EF_EE = $data['team2_vitories_number'];
        }
        if($round1_winners[0] == "EA" && $round1_winners[1] == "EG" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EA_vs_EG_EA, $round2_EA_vs_EG_EG, $EA_success_probability, $EG_success_probability);
            $round2_EA_vs_EG_winner = $data['winner'];
            $round2_EA_vs_EG_EA = $data['team1_vitories_number'];
            $round2_EA_vs_EG_EG = $data['team2_vitories_number'];
        }
        if($round1_winners[0] == "EA" && $round1_winners[1] == "EH" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EA_vs_EH_EA, $round2_EA_vs_EH_EH, $EA_success_probability, $EH_success_probability);
            $round2_EA_vs_EH_winner = $data['winner'];
            $round2_EA_vs_EH_EA = $data['team1_vitories_number'];
            $round2_EA_vs_EH_EH = $data['team2_vitories_number'];
        }
        if($round1_winners[0] == "EB" && $round1_winners[1] == "EE" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EB_vs_EE_EB, $round2_EB_vs_EE_EE, $EB_success_probability, $EE_success_probability);
            $round2_EB_vs_EE_winner = $data['winner'];
            $round2_EB_vs_EE_EB = $data['team1_vitories_number'];
            $round2_EB_vs_EE_EE = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "EB" && $round1_winners[1] == "EF" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EB_vs_EF_EB, $round2_EB_vs_EF_EF, $EB_success_probability, $EF_success_probability);
            $round2_EB_vs_EF_winner = $data['winner'];
            $round2_EB_vs_EF_EB = $data['team1_vitories_number'];
            $round2_EB_vs_EF_EF = $data['team2_vitories_number'];
        }


        if($round1_winners[0] == "EB" && $round1_winners[1] == "EG" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EB_vs_EG_EB, $round2_EB_vs_EG_EG, $EB_success_probability, $EG_success_probability);
            $round2_EB_vs_EG_winner = $data['winner'];
            $round2_EB_vs_EG_EB = $data['team1_vitories_number'];
            $round2_EB_vs_EG_EG = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "EB" && $round1_winners[1] == "EH" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EB_vs_EH_EB, $round2_EB_vs_EH_EH, $EB_success_probability, $EH_success_probability);
            $round2_EB_vs_EH_winner = $data['winner'];
            $round2_EB_vs_EH_EB = $data['team1_vitories_number'];
            $round2_EB_vs_EH_EH = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "EC" && $round1_winners[1] == "EE" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EC_vs_EE_EC, $round2_EC_vs_EE_EE, $EC_success_probability, $EE_success_probability);
            $round2_EC_vs_EE_winner = $data['winner'];
            $round2_EC_vs_EE_EC = $data['team1_vitories_number'];
            $round2_EC_vs_EE_EE = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "EC" && $round1_winners[1] == "EF" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EC_vs_EF_EC, $round2_EC_vs_EF_EF, $EC_success_probability, $EF_success_probability);
            $round2_EC_vs_EF_winner = $data['winner'];
            $round2_EC_vs_EF_EC = $data['team1_vitories_number'];
            $round2_EC_vs_EF_EF = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "EC" && $round1_winners[1] == "EG" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EC_vs_EG_EC, $round2_EC_vs_EG_EG, $EC_success_probability, $EG_success_probability);
            $round2_EC_vs_EG_winner = $data['winner'];
            $round2_EC_vs_EG_EC = $data['team1_vitories_number'];
            $round2_EC_vs_EG_EG = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "EC" && $round1_winners[1] == "EH" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_EC_vs_EH_EC, $round2_EC_vs_EH_EH, $EC_success_probability, $EH_success_probability);
            $round2_EC_vs_EH_winner = $data['winner'];
            $round2_EC_vs_EH_EC = $data['team1_vitories_number'];
            $round2_EC_vs_EH_EH = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "ED" && $round1_winners[1] == "EE" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_ED_vs_EE_ED, $round2_ED_vs_EE_EE, $ED_success_probability, $EE_success_probability);
            $round2_ED_vs_EE_winner = $data['winner'];
            $round2_ED_vs_EE_ED = $data['team1_vitories_number'];
            $round2_ED_vs_EE_EE = $data['team2_vitories_number'];
        }

        if($round1_winners[0] == "ED" && $round1_winners[1] == "EF" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_ED_vs_EF_ED, $round2_ED_vs_EF_EF, $ED_success_probability, $EF_success_probability);
            $round2_ED_vs_EF_winner = $data['winner'];
            $round2_ED_vs_EF_ED = $data['team1_vitories_number'];
            $round2_ED_vs_EF_EF = $data['team2_vitories_number'];
        }
        
        if($round1_winners[0] == "ED" && $round1_winners[1] == "EG" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_ED_vs_EG_ED, $round2_ED_vs_EG_EG, $ED_success_probability, $EG_success_probability);
            $round2_ED_vs_EG_winner = $data['winner'];
            $round2_ED_vs_EG_ED = $data['team1_vitories_number'];
            $round2_ED_vs_EG_EG = $data['team2_vitories_number'];
        }
        if($round1_winners[0] == "ED" && $round1_winners[1] == "EH" ){
            $data = self:: match($round1_winners[0], $round1_winners[1],$round2_ED_vs_EH_ED, $round2_ED_vs_EH_EH, $ED_success_probability, $EH_success_probability);
            $round2_ED_vs_EH_winner = $data['winner'];
            $round2_ED_vs_EH_ED = $data['team1_vitories_number'];
            $round2_ED_vs_EH_EH = $data['team2_vitories_number'];
        }


        $round2_winners = array();
        $round2_loosers_results = array();

        if($round2_EA_vs_EE_winner !="" && $round2_EA_vs_EE_winner=="EA"){
            array_push($round2_winners,$round2_EA_vs_EE_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EE_EE);
        }
        
        if($round2_EA_vs_EE_winner !="" && $round2_EA_vs_EE_winner=="EE"){
            array_push($round2_winners,$round2_EA_vs_EE_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EE_EA);
        }

        if($round2_EA_vs_EF_winner !="" && $round2_EA_vs_EF_winner=="EA"){
            array_push($round2_winners,$round2_EA_vs_EF_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EF_EF);
        }
        
        if($round2_EA_vs_EF_winner !="" && $round2_EA_vs_EF_winner=="EF"){
            array_push($round2_winners,$round2_EA_vs_EF_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EF_EA);
        }

        if($round2_EA_vs_EG_winner !="" && $round2_EA_vs_EG_winner=="EA"){
            array_push($round2_winners,$round2_EA_vs_EG_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EG_EG);
        }
        
        if($round2_EA_vs_EG_winner !="" && $round2_EA_vs_EG_winner=="EG"){
            array_push($round2_winners,$round2_EA_vs_EG_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EG_EA);
        }

        if($round2_EA_vs_EH_winner !="" && $round2_EA_vs_EH_winner=="EA"){
            array_push($round2_winners,$round2_EA_vs_EH_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EH_EH);
        }
        
        if($round2_EA_vs_EH_winner !="" && $round2_EA_vs_EH_winner=="EH"){
            array_push($round2_winners,$round2_EA_vs_EH_winner);
            array_push($round2_loosers_results,$round2_EA_vs_EH_EA);
        }

        if($round2_EB_vs_EE_winner !="" && $round2_EB_vs_EE_winner=="EB"){
            array_push($round2_winners,$round2_EB_vs_EE_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EE_EE);
        }
        
        if($round2_EB_vs_EE_winner !="" && $round2_EB_vs_EE_winner=="EE"){
            array_push($round2_winners,$round2_EB_vs_EE_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EE_EB);
        }


        if($round2_EB_vs_EF_winner !="" && $round2_EB_vs_EF_winner=="EB"){
            array_push($round2_winners,$round2_EB_vs_EF_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EF_EF);
        }
        
        if($round2_EB_vs_EF_winner !="" && $round2_EB_vs_EF_winner=="EF"){
            array_push($round2_winners,$round2_EB_vs_EF_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EF_EB);
        }


        if($round2_EB_vs_EG_winner !="" && $round2_EB_vs_EG_winner=="EB"){
            array_push($round2_winners,$round2_EB_vs_EG_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EG_EG);
        }
        
        if($round2_EB_vs_EG_winner !="" && $round2_EB_vs_EG_winner=="EG"){
            array_push($round2_winners,$round2_EB_vs_EG_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EG_EB);
        }

        if($round2_EB_vs_EH_winner !="" && $round2_EB_vs_EH_winner=="EB"){
            array_push($round2_winners,$round2_EB_vs_EH_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EH_EH);
        }
        
        if($round2_EB_vs_EH_winner !="" && $round2_EB_vs_EH_winner=="EH"){
            array_push($round2_winners,$round2_EB_vs_EH_winner);
            array_push($round2_loosers_results,$round2_EB_vs_EH_EB);
        }

        if($round2_EC_vs_EE_winner !="" && $round2_EC_vs_EE_winner=="EC"){
            array_push($round2_winners,$round2_EC_vs_EE_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EE_EE);
        }
        
        if($round2_EC_vs_EE_winner !="" && $round2_EC_vs_EE_winner=="EE"){
            array_push($round2_winners,$round2_EC_vs_EE_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EE_EC);
        }

        if($round2_EC_vs_EF_winner !="" && $round2_EC_vs_EF_winner=="EC"){
            array_push($round2_winners,$round2_EC_vs_EF_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EF_EF);
        }
        
        if($round2_EC_vs_EF_winner !="" && $round2_EC_vs_EF_winner=="EF"){
            array_push($round2_winners,$round2_EC_vs_EF_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EF_EC);
        }


        if($round2_EC_vs_EG_winner !="" && $round2_EC_vs_EG_winner=="EC"){
            array_push($round2_winners,$round2_EC_vs_EG_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EG_EG);
        }
        
        if($round2_EC_vs_EG_winner !="" && $round2_EC_vs_EG_winner=="EG"){
            array_push($round2_winners,$round2_EC_vs_EG_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EG_EC);
        }

        if($round2_EC_vs_EH_winner !="" && $round2_EC_vs_EH_winner=="EC"){
            array_push($round2_winners,$round2_EC_vs_EH_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EH_EH);
        }
        
        if($round2_EC_vs_EH_winner !="" && $round2_EC_vs_EH_winner=="EH"){
            array_push($round2_winners,$round2_EC_vs_EH_winner);
            array_push($round2_loosers_results,$round2_EC_vs_EH_EC);
        }

        if($round2_ED_vs_EE_winner !="" && $round2_ED_vs_EE_winner=="ED"){
            array_push($round2_winners,$round2_ED_vs_EE_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EE_EE);
        }
        
        if($round2_ED_vs_EE_winner !="" && $round2_ED_vs_EE_winner=="EE"){
            array_push($round2_winners,$round2_ED_vs_EE_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EE_ED);
        }

        if($round2_ED_vs_EF_winner !="" && $round2_ED_vs_EF_winner=="ED"){
            array_push($round2_winners,$round2_ED_vs_EF_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EF_EF);
        }
        
        if($round2_ED_vs_EF_winner !="" && $round2_ED_vs_EF_winner=="EF"){
            array_push($round2_winners,$round2_ED_vs_EF_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EF_ED);
        }

        if($round2_ED_vs_EG_winner !="" && $round2_ED_vs_EG_winner=="ED"){
            array_push($round2_winners,$round2_ED_vs_EG_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EG_EG);
        }
        
        if($round2_ED_vs_EG_winner !="" && $round2_ED_vs_EG_winner=="EG"){
            array_push($round2_winners,$round2_ED_vs_EG_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EG_ED);
        }

        if($round2_ED_vs_EH_winner !="" && $round2_ED_vs_EH_winner=="ED"){
            array_push($round2_winners,$round2_ED_vs_EH_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EH_EH);
        }
        
        if($round2_ED_vs_EH_winner !="" && $round2_ED_vs_EH_winner=="EH"){
            array_push($round2_winners,$round2_ED_vs_EH_winner);
            array_push($round2_loosers_results,$round2_ED_vs_EH_ED);
        }

        $data = array (
          "round0_winners" => $round0_winners,
          "round0_loosers_results" => $round0_loosers_results,
          "round1_winners" => $round1_winners,
          "round1_loosers_results" => $round1_loosers_results,
          "round2_winners" => $round2_winners,
          "round2_loosers_results" => $round2_loosers_results,
        );

        return $data;
       
    }

    public function east_west(){
        
        $west_data = self::west();
        $west_round2_winners=  $west_data['round2_winners'];

        $east_data = self::east();
        $east_round2_winners=  $east_data['round2_winners'];

        $west_array= array("WA", "WB", "WC", "WD", "WE", "WF", "WG", "WH");
        $east_array= array("EA", "EB", "EC", "ED", "EE", "EF", "EG", "EH");

        $team1_vitories_number = 0;
        $team2_vitories_number = 0;

        for ($i=0; $i<8; $i++){
                  for ($j=0; $j<8; $j++){

                    if($west_round2_winners[0] ==  $west_array[$i] && $east_round2_winners[0] == $east_array[$j] ){
                        $data = self:: match($west_round2_winners[0], $east_round2_winners[0],$team1_vitories_number, $team2_vitories_number, $this->west_probabilities[$i], $this->east_probabilities[$j]);
                        $winner = $data['winner'];
                        $team1_vitories_number = $data['team1_vitories_number'];
                        $team2_vitories_number = $data['team2_vitories_number'];

                        $final_match_data= array(
                           'winner' => $winner,
                           'team1_vitories_number' => $team1_vitories_number,
                           'team2_vitories_number' => $team2_vitories_number
                        );

                        return $final_match_data;
                    }
                  }
        }

    }


     // generate random array   
    public function random_array(){

        $random_array = array();

        for($i=0; $i<=20; $i++){
            $random_variable = rand(15, 100)/100;
            array_push($random_array,$random_variable);
        }

        return $random_array;
    }


    // generate random number 
    public function random_number(){

        $random_number= rand(0,100)/100;
        return $random_number;
        
    }


    // match between two teams
    public function match($team1,$team2, $team1_vitories_number, $team2_vitories_number, $team1_success_probability, $team2_success_probability ){
      
        while ($team1_vitories_number != 4 && $team2_vitories_number != 4 ){

            $team1_random_number = self::random_number();
            $tean2_random_number = self::random_number();
            
            if(($team1_random_number*$team1_success_probability) > ($tean2_random_number*$team2_success_probability)){
                $team1_vitories_number  = $team1_vitories_number  + 1;
            }else{
               $team2_vitories_number = $team2_vitories_number + 1;
            }
        }
            
        if( $team1_vitories_number <  $team2_vitories_number){
            
                $winner = $team2;
            
            }else{
            
                $winner = $team1;
            
            }

        $data = array (
            'winner' => $winner ,
            'team1_vitories_number' =>$team1_vitories_number,
            'team2_vitories_number' =>$team2_vitories_number,
        );

        return $data;
        
    }




  



  
    
    
}
