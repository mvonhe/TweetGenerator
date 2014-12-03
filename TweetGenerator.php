<?php

//ini_set('display_errors','On');
//error_reporting(E_ALL | E_STRICT);

// This function takes an integer Numer of Tweets
// and an Array, which consists of one or more arrays
// that contain percentage of tweets (int),
// a string with the topic of the tweet
// and the polarity of the tweets (pos/neg/neut).
// It retures an array of (tweets) strings.

function generateTweets($numberOfTweets, $listOfParameters){

	$tweets=array();
	$j;
	$i;
	$positiveAdjs=array("terrific","awesome","some really great stuff");
	$negativeAdjs=array("truly terrible","absolute crap");
	$neutralAdjs=array("okay","not awful","nothing special");

//debug
//	foreach($listOfParameters as $params){
//		foreach ($params as $ps){
//			echo $ps;
//}
//}


//TO DO
// - what if user enters total <100%?
// - expand possible output
// - randomly add @'s or #'s to topic/brand

	for($j=0; $j<count($listOfParameters); $j++){
		if ($listOfParameters[$j][2]=="pos"){
			for ($i=0; $i<($numberOfTweets/100*$listOfParameters[$j][0]);$i++){
				array_push($tweets, "I think #" . $listOfParameters[$j][1] . " is " . $positiveAdjs[array_rand($positiveAdjs)] . ".");
			}
		} 
		elseif ($listOfParameters[$j][2]=="neg"){
			for ($i=0; $i<($numberOfTweets/100*$listOfParameters[$j][0]);$i++){
		                array_push($tweets, "I think #" . $listOfParameters[$j][1] . " is " . $negativeAdjs[array_rand($negativeAdjs)] . ".");
			}
		} 
		elseif ($listOfParameters[$j][2]=="neut"){
			for ($i=0; $i<($numberOfTweets/100*$listOfParameters[$j][0]);$i++){
        			array_push($tweets, "I think #" . $listOfParameters[$j][1] . " is " . $neutralAdjs[array_rand($neutralAdjs)] . ".");
			}
		// Error with polarity variable
	//	} else {
	//		return "Error";
		}
	}

	
	//$tweets = array("I think " . $listOfParameters[0][1] . " is " . $positiveAdjs[array_rand($positiveAdjs)] . ".");
	//$tweets = array("Tweet1", "Tweet2", "Tweet3");
	return $tweets;

}

?>
