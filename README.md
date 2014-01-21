MakeDemBots_PHP
===============

## PHP Templating script for making Twitter Bots

This is a simple script for basically templating out strings for tweeting. Its only useful in that it requires basically no code to get working, and lets you jump RIGHT IN!

This scripts just makes and posts tweets as text, it doesn't reply or do any fancy stuff really.

##Working with the templates
**Templates**-
Templates are how your structure your tweets. The script chooses one template from your list at random, and then fills in the blanks (Parameters, see next subsection), in order to create your tweet.

**Parameters**-
Parameters refer to the different values that may get inserted into your templates. A single template can have multiple occurences of the same parameter, and for each occurance, will choose a random value from the list of all possible values for that parameter.


###Adding Parameters
Adding parameters is most likely the most complex part of all of this (and its not complex at all). In order to add a new parameter you will have to do two things.
* Create a php file that will hold a list of all possible values
* Add the parameter to the params.php function

It is **very important** that you use the exact same name for your parameter filename as you do for how you list in the *params.php* 

As an example you may want to create a param called **material**

To start you would *create a file in the paramsVals folder called material.php*

Next in params.php you would add the line 
	
	material
	
In order to illustrate thism a few sample parameters are already in place in the code.

###Creating Templates
Templates are created in the template.php file. 
A new template begins after each line return (much in the same way as parameters)
A template is a sentence (or whatever) with some blanks in it for parameters.
To add a parameter into a template surround it in underscores.
	
	This is a _parameter_ inside a template
	
A template will be chosen at random from the list.
You may use the same parameter multiple times in a template, or multiple parameters, and it will choose a random value for each individually.

	A _pet_, a _pet_, and and some _pets_ were all _adj_.

##Connecting to Twitter
This section is more or less peripheral.

###Setting Up Twitter
In order to post these tweets to twitter, you will need to create an "app" through [https://dev.twitter.com/](https://dev.twitter.com/)

In index.php you will see places to put in all the secret numbers they give you. 
*Make sure your app settings allow for read and write*

###Including OAuth.php and twitteroauth.php
Grab these files and place them in the top level of the folder, alongside index.php.
That should be it, but if you have problems later on, check their respective readmes
[https://github.com/abraham/twitteroauth/tree/master/twitteroauth](OAuth and TwitterOAuth)

##Posting Tweets/Automating

###Manually
If you just want to test and make sure the tweets posts, set the $liveApp boolean at the top of index.php to true;
	
	$liveApp=false;
	
Turns into..
	
	$liveApp=true;
	
And then just load the page on your server, or MAMP, or WAMP, or whatever you are making this on.

###Cron?
If you want to automate it, a tweet will be posted every time the script/page loads. You can Google/look into Cron Jobs which are probably going to be the easiest way.

##Samples
Some bots made with this script/modified versions thereof:
[https://twitter.com/DorfFort_eBooks](@DorfFort_eBooks)
[https://twitter.com/captainsloggame](@captainsLogGame)

##Contributors
* William Anderson - Developer and Maintainer