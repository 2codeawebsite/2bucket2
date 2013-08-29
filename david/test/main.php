<?php

require_once('user.php');

$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner');

$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
echo $yearsLeftToLive;
echo "<br>";

$numberOfUnachievedGoalsProcentage = $user->numberOfUnachievedGoalsProcentage(10, 4);
echo $numberOfUnachievedGoalsProcentage;
echo "<br>";

$fearFactor = $user->fearFactor($yearsLeftToLive, $numberOfUnachievedGoalsProcentage);
echo $fearFactor; 

?>