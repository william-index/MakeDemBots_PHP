<?php
//MakeDemBots_PHP
//A PHP Twitter Bot Templating Thing
//William Anderson 2014

//connects to twitter
//requires OAuth and twitteroauth.php
//get both of these files (yup, just oauth.php and twitteroauth.php) here: https://github.com/abraham/twitteroauth/tree/master/twitteroauth
//put them in the same directory as index.php, thats it
//you dont need to add any code, 
//just set this to true when ready
$liveApp=false;

//secret numbers from twitter
if($liveApp){
	require_once 'twitteroauth.php';
 
	define("CONSUMER_KEY", "____");
	define("CONSUMER_SECRET", "____");
	define("OAUTH_TOKEN", "____");
	define("OAUTH_SECRET", "____");
 
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);
	$content = $connection->get('account/verify_credentials');
}

//builds the event
buildEvent();

//this function basically does it all, it 
//builds the tweet, and checks it, if the tweet is valid
//it passes it over to be posted to twitter
function buildEvent(){
	GLOBAL $liveApp;
	//holds array list of possible events
	$events="";
	//gets all the templates
	$events=file_get_contents("data/templates.php");
	//breaks events list into array
	$events=explode("\n",$events);
	//selects an event template
	$event=rand(0,count($events)-1);
	$event=$events[$event];
	//list of replacable stats
	$possibleParams=file_get_contents("data/params.php");
	$possibleParams=explode("\n",$possibleParams);
	//cycles through the event for each param type
	foreach($possibleParams as $param){
		//gets the list of params
		$paramVals=file_get_contents("data/paramsVals/".$param.".php");
		//breaks into array
		$paramVals=explode("\n",$paramVals);
		$countOcc=explode("_".$param."_",$event);
		$countOcc=count($countOcc)-1;
		for($cc=1; $cc<=$countOcc; $cc++){
			//chooses a random value
			$newVal = $paramVals[rand(0,count($paramVals)-1)];
			//replaces occurences in event
			$event=preg_replace("/_".$param."_/",$newVal,$event,1);
		}	
	}
	//sets the tweet
	if(strlen($event)<=140){
		//posts the tweet, uncomment it to make it post
		if($liveApp){
			postTweet($event);
		}else{
			echo($event);
		}
	}else{
		//tries again
		buildEvent();
	}
}
//posts the tweet on the timeline for the public
function postTweet($tweet){
	GLOBAL $connection;
	$connection->post('statuses/update', array('status' => $tweet));
}
?>