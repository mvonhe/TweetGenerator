
	
<?php

//ini_set('display_errors','On');
//error_reporting(E_ALL | E_STRICT);

// This function takes an integer Numer of Tweets
// and an Array, which consists of one or more arrays
// that contain percentage of tweets (int),
// a string with the topic of the tweet
// and the polarity of the tweets (pos/neg/neut).
// It retures an array of (tweets) strings.

function generateTweetsDia($numberOfTweets, $listOfParameters){

	
	
	
	
	
//------------------------------------------------------------------------------------------------------------

	//function for single sentences
	function generateSentence($feel, $company){ //How to make sure, that the company is in each sentence?
		
		//vocabulary
		$verbspos = array("like","love","adore",);
		$verbsneg = array ("don't like","hate","can't stand");
		$verbsneut = array ("don't mind");
		$pronouns = array ("I","we");
		$adjectivpos = array ("wonderful","beautiful","adorable","interesting","exciting","lovely","nice","the best");
		$adjectivneg = array ("horrible","terrible","unacceptable","annoying","boring");
		$adjectivneut = array("unspectacular", "unexciting","not bad","nothing special");
		$nouns = array("things","company","products","it");
		$Expressionspos = array ("like it","love it", "great");
		$Expressionsneg = array ("hate it","worst thing ever");
		$Expressionsneut = array ("hmm");
		$Questiontags = array("absolutely!","yes!");
		
	
		//Make sure that the generated sentence represents the right feeling
		if ($feel == "pos"){
			$verbs = $verbspos;
			$adjective = $adjectivpos;
			$Expression = $Expressionspos;
			}

		elseif ($feel == "neg") {
			$verbs = $verbsneg;
			$adjective = $adjectivneg;
			$Expression = $Expressionsneg;
			}		
		else {
			$verbs = $verbsneut;
			$adjective = $adjectivneut;
			$Expression = $Expressionsneut;
				}


		//setting some variables
		$sen = ""; //einzelner tweet

		//set a variable sentence length
		srand ((double) microtime() * 1000000); 
		$x = rand(1,4); 
		$firstpos = "";
		
		
		//make sentence
		for ($spos = 0; $spos < $x; $spos++){

		//random number for the kind of word
		srand ((double) microtime() * 1000000); 
		$ZZ = rand(1,100); 
		
		
		switch($spos) : //to choose the word

			case  0: //first word
				
				if ($x==1){
				
				srand ((double) microtime() * 1000000); 
				$WZ = rand(0, (count($Expression)-1)); //random number for the specific word
				
				$sen = $sen.$Expression[$WZ];
				
				}
		
				elseif ($ZZ >= 40 AND $ZZ <= 80)
				{
				srand ((double) microtime() * 1000000); 
				$WZ = rand(0, (count($pronouns)-1)); //random number for the specific word

				$sen= $sen.$pronouns[$WZ]." ";
				$firstpos = "pers";
				}
	
				
				
				else
				{
				srand ((double) microtime() * 1000000); 
				$WZ = rand(0, (count($verbs)-1)); //random number for the specific word

				$sen= $sen."do"." ";
				$firstpos = "verb";
				}
				
		
				break;
			
			
			
			case  1: //second word
		        
		        //second position abandons from first
		        if ($firstpos == "verb"){
					if ($ZZ >= 51)
					{
					srand ((double) microtime() * 1000000); 
					$WZ = rand(0, (count($pronouns)-1)); //random number for the specific word

					$sen= $sen.$pronouns[$WZ]." ";
					
					
					}
					
	
					else
					{
				
					$sen= $sen.$company." ";
					}
					//for the correct order in questions
					srand ((double) microtime() * 1000000); 
					$WZ = rand(0, (count($verbs)-1)); //random number for the specific word

					$sen= $sen.$verbs[$WZ]." ";
					}
					
				else
					{
					srand ((double) microtime() * 1000000); 
					$WZ = rand(0, (count($verbs)-1)); //random number for the specific word

					$sen= $sen.$verbs[$WZ]." ";
					}
		
				break;
				
			case 2: //third word
		
				if ($ZZ >= 40 AND $ZZ <= 90)
				{
				srand ((double) microtime() * 1000000); 
				$WZ = rand(0, (count($adjective)-1)); //random number for the specific word

				$sen= $sen.$adjective[$WZ]." ";
				}
	
				else
				{
				
				$sen= $sen.$company." ";
			
				}
				
				break;
				
			case  3: //forth word
		
				if ($ZZ >= 20 AND $ZZ <= 90)
				{
				srand ((double) microtime() * 1000000); 
				$WZ = rand(0, (count($nouns)-1)); //random number for the specific word

				$sen= $sen.$nouns[$WZ];
				}
	
				else
				{
				

				$sen= $sen.$company;
				}
				
		
				break;
			
				
	
			
		

		endswitch;
		}
		
		if ($firstpos == "verb"){
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, (count($Questiontags)-1)); //random number for the specific word
			$sen = $sen."? ".$Questiontags[$WZ];
			}
			
		elseif ($firstpos == "pers" AND ($feel == "pos" OR $feel == "neg")){
			$sen = $sen."!";
			}
		
		else {
			$sen = $sen.".";
		}
		
		$sen = $sen."#".$company;
		return $sen;
}


//---------------------------------------------------------------------------------------------------------------
	
	//start function
	
	$tweetsent = array();
	
	
	for ($j=0; $j < (count($listOfParameters)); $j++) {
		
		//load parameters
		$actualcomp = $listOfParameters[$j];
		$percentage = $actualcomp[0];
		$company =  $actualcomp[1];
		$feel = $actualcomp[2];
		
		$numberfeel = $percentage / 100 * $numberOfTweets;
		
		//generate tweets
		for ($i = 0; $i < $numberfeel; $i++){
			
			array_push($tweetsent, generateSentence($feel, $company)); 
			}
	
	}
	

	
	
	
return $tweetsent; //array("tweets","ordered","by","sentiment",":)");

}

	
?>


