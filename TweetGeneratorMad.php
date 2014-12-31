<?php

//ini_set('display_errors','On');
//error_reporting(E_ALL | E_STRICT);

// This function takes an integer number of tweets
// and an array, which consists of one or more arrays
// that contain percentage of tweets (int),
// a string with the topic of the tweet
// and the polarity of the tweets (pos/neg/neut).
// It retures an array of (tweets) strings.

function generateTweetsMad($numberOfTweets, $listOfParameters){
	//array of tweets, to be returned to interface
	$tweets=array();
		
	$positiveAdjs=array("terrific","awesome","really great");
	$negativeAdjs=array("truly terrible","absolute crap");
	$neutralAdjs=array("okay","not awful","nothing special");

	$negVerbs=array("hate","despise","really don't like");
	$posVerbs=array("like","dig","absolutely love", "love");
	$neutrVerbs=array("can't say I hate","can't say I love");
	
	$sentence1="{I think}{this}{hashtagOr@}{brand} {stuff}is {adj}!";
	$sentence2="I {verb} {hashtagOr@}{brand}!";
	
	$hashtagOrAt=array('@','#');

	for($j=0; $j<count($listOfParameters); $j++){
		$tweet='';
		
		if ($listOfParameters[$j][2]=="pos"){
			for ($i=0; $i<($numberOfTweets/100*$listOfParameters[$j][0]);$i++){
				//apply the different sentence templates
				if(rand(0,5)<2){ $sent=$sentence1;
				} else { $sent=$sentence2;}

				//randomly insert @ or # before brand
				$tweet=str_replace('{hashtagOr@}',$hashtagOrAt[array_rand($hashtagOrAt)],$sent);
				//replace brand placeholder
				$tweet=str_replace('{brand}',$listOfParameters[$j][1],$tweet);
				//replace sentiment placeholder
				$tweet=str_replace('{adj}',$positiveAdjs[array_rand($positiveAdjs)],$tweet);
				$tweet=str_replace('{verb}',$posVerbs[array_rand($posVerbs)],$tweet);
				//extra emphasis for neg and pos
				if(rand(0,5)<1){$tweet=$tweet . " For real!";}
				//some variations				
				if(rand(0,5)<=1){
					$tweet=str_replace('{I think}','I think ',$tweet);} else {$tweet=str_replace('{I think}','',$tweet);}
				if (rand(0,5)<=1) {$tweet=str_replace(['{this}','{stuff}'],['this ','stuff '],$tweet);
				} else { $tweet=str_replace(['{this}','{stuff}'],['',''],$tweet);}					
				
				array_push($tweets, $tweet);
//				shuffle($tweets);
	}}		
		elseif ($listOfParameters[$j][2]=="neg"){
			for ($i=0; $i<($numberOfTweets/100*$listOfParameters[$j][0]);$i++){	
		                //array_push($tweets, "I think #" . $listOfParameters[$j][1] . " is " . $negativeAdjs[array_rand($negativeAdjs)] . ".");
		               
		                if(rand(0,5)<2){ $sent=$sentence1;
				} else { $sent=$sentence2;}

				//randomly insert @ or # before brand
				$tweet=str_replace('{hashtagOr@}',$hashtagOrAt[array_rand($hashtagOrAt)],$sent);
				//replace brand placeholder
				$tweet=str_replace('{brand}',$listOfParameters[$j][1],$tweet);
				//replace sentiment placeholder
				$tweet=str_replace('{adj}',$negativeAdjs[array_rand($negativeAdjs)],$tweet);
				$tweet=str_replace('{verb}',$negVerbs[array_rand($negVerbs)],$tweet);
				//extra emphasis for neg and pos
				if(rand(0,5)<1){$tweet=$tweet . " For real!";}
				//some variations				
				if(rand(0,5)<=1){
					$tweet=str_replace('{I think}','I think ',$tweet);} else {$tweet=str_replace('{I think}','',$tweet);}
				if (rand(0,5)<=1) {$tweet=str_replace(['{this}','{stuff}'],['this ','stuff '],$tweet);
				} else { $tweet=str_replace(['{this}','{stuff}'],['',''],$tweet);}					
				
				array_push($tweets, $tweet);
//				shuffle($tweets);

		        }
		}
		
		elseif ($listOfParameters[$j][2]=="neut"){
			for ($i=0; $i<($numberOfTweets/100*$listOfParameters[$j][0]);$i++){
        			//array_push($tweets, "I think #" . $listOfParameters[$j][1] . " is " . $neutralAdjs[array_rand($neutralAdjs)] . ".");
        		 
		                if(rand(0,5)<2){ $sent=$sentence1;
				} else { $sent=$sentence2;}

				//randomly insert @ or # before brand
				$tweet=str_replace('{hashtagOr@}',$hashtagOrAt[array_rand($hashtagOrAt)],$sent);
				//replace brand placeholder
				$tweet=str_replace('{brand}',$listOfParameters[$j][1],$tweet);
				//replace sentiment placeholder
				$tweet=str_replace('{adj}',$neutralAdjs[array_rand($neutralAdjs)],$tweet);
				$tweet=str_replace('{verb}',$negVerbs[array_rand($negVerbs)],$tweet);
	
				//some variations				
				if(rand(0,5)<=1){
					$tweet=str_replace('{I think}','I think ',$tweet);} else {$tweet=str_replace('{I think}','',$tweet);}
				if (rand(0,5)<=1) {$tweet=str_replace(['{this}','{stuff}'],['this ','stuff '],$tweet);
				} else { $tweet=str_replace(['{this}','{stuff}'],['',''],$tweet);}					
				
				array_push($tweets, $tweet);
//				shuffle($tweets);
		        }
        			
		}
		
		}
		
	

	
	//$tweets = array("I think " . $listOfParameters[0][1] . " is " . $positiveAdjs[array_rand($positiveAdjs)] . ".");
	//$tweets = array("Tweet1", "Tweet2", "Tweet3");
	return $tweets;

}

?>
