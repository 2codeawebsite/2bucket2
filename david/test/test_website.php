<?php
require_once('simpletest/browser.php');

// http://www.simpletest.org/en/browser_documentation.html

$array = array();
    
$browser = &new SimpleBrowser();

// $browser->get('http://localhost:8080/2bucket/');
$browser->get('http://2bet.edit4web.com/');
$title = $browser->getTitle();
array_push($array, $title);

$browser->click('Buy coins to spend!');
$title = $browser->getTitle();
array_push($array, $title);
$browser->click('Back to frontpage');

$browser->click('Watch a tutorial');
$title = $browser->getTitle();
array_push($array, $title);
$browser->click('Back to frontpage');

$browser->click('New user?');
$title = $browser->getTitle();
array_push($array, $title);
$browser->back();

$browser->click('Sign in');
$title = $browser->getTitle();
array_push($array, $title);


//var_dump($array);

echo '<h1>Browser test 1 - Get titles</h1>';
echo '<br>';

foreach($array as $key => $value) {
  	echo "$key : $value";
	echo '<br>';
}

echo $browser->getContent();


?>