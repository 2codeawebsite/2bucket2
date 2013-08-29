<?php
require_once('simpletest/browser.php');

    
echo 'Browser test 2 - Login - ';
$browser = &new SimpleBrowser();
$array = array();

// $browser->get('http://localhost:8080/2bucket/');
$browser->get('http://2bet.edit4web.com/');
$title = $browser->getTitle();
array_push($array, $title);

$browser->click('Sign in');
$title = $browser->getTitle();
array_push($array, $title);
$browser->setField('username', 'user1');
$browser->setField('password', '1234');

$browser->click('Login');
//$browser->clickSubmitById('submit');
//$title = $browser->getTitle();
//array_push($array, $title);

var_dump($array);

 
echo $browser->getContent();




?>