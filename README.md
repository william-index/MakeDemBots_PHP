MakeDemBots_PHP
===============

## PHP Templating script for making Twitter Bots

This is a simple script for basically templating out strings for tweeting. Its only useful in that it requires basically no code to get working, and
lets you jump RIGHT IN!

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
	This is a \_parameter\_ inside a template
	
A template will be chosen at random from the list.
You may use the same parameter multiple times in a template, or multiple parameters, and it will choose a random value for each individually.

	A _pet_, a _pet_, and and some _pets_ were all _adj_.

##Connecting to Twitter

###Setting Up Twitter

###Including OAuth.php and twitteroauth.php

##Posting Tweets/Automating

###Manually
	$liveApp=false;

###Cron?