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