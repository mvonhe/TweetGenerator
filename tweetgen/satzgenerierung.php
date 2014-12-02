<?php

function satzgenerierung ($numberOfTweets, $listOfParameters){

$verbs = array("is","am","like","don't like","hate", "hates","don't mind");
$pronouns = array ("I","he","she","you","we");
$adjective = array ("awful","horrible","wonderful","beautiful","adorable");
$company = array ("Apple","Windows","UBS");

$Tweet = array(); //array for tweet
$sen = ""; //Hilfsvariable


$x = 3 ;//Testvariable


srand ((double) microtime() * 1000000); 
$ZZ = rand(1,100); //random number for the kind of word

for ($spos = 0; $spos <= $x; $spos++){
	
	switch($spos) :

		case  0: //Zweites Wort
		
			if ($ZZ >= 40 AND $ZZ <= 80)
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($pronouns)); //random number for the specific word

			$sen= $sen.$pronouns[$WZ]." ";
			}
	
			elseif ($ZZ < 40)
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($company)); //random number for the specific word

			$sen= $sen.$company[$WZ]." ";
			}
			else
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($verbs)); //random number for the specific word

			$sen= $sen.$verbs[$WZ]." ";
			}
		
			break;
			
			
			
			case  1: //Erstes Wort
		
			if ($ZZ >= 80 AND $ZZ <= 90)
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($pronouns)); //random number for the specific word

			$sen= $sen.$pronouns[$WZ]." ";
			}
	
			elseif ($ZZ > 90)
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($company)); //random number for the specific word

			$sen= $sen.$company[$WZ]." ";
			}
			else
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($verbs)); //random number for the specific word

			$sen= $sen.$verbs[$WZ]." ";
			}
		
			break;
			
			
			
			
			
			
	
		default: //Alle anderen
		
			if ($ZZ >= 40 AND $ZZ <= 90)
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($adjective)); //random number for the specific word

			$sen= $sen.$adjective[$WZ]." ";
			}
	
			elseif ($ZZ < 50)
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($company)); //random number for the specific word

			$sen= $sen.$company[$WZ]." ";
			
			}
			else
			{
			srand ((double) microtime() * 1000000); 
			$WZ = rand(0, count($verbs)); //random number for the specific word

			$sen= $sen.$verbs[$WZ]." ";
			}
		

	endswitch;
	
	$Tweet[0] = $sen;
	}






echo $Tweet[0];
}









?>