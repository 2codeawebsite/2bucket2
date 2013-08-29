<?php

// http://www.simpletest.org/en/first_test_tutorial.html
 
require_once('simpletest/autorun.php');
require_once('user.php');

class TestOfUser extends UnitTestCase {
	
	function setUp() {}
	
	/*
	 * Test if object is created
	 * */
	function testGetAgeCreateObject() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter');
		$this->assertNotNull($user);
	}
	
	/*
	 * Test getAge() method
	 * */
	function testGetAgeGetAge() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter');
		$age = $user->getAge();
		$this->assertEqual($age, 45);
	}
	
	/*
	 * Test years left to live based on age and gender (male)
	 */
	function testGetAgeMale() {
		$user = new User('Jens', 'Hansen', 'jhansen', 'jens@hansen.dk', 'Copenhagen', 'Denmark', 45, 'male', 'carpenter');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertEqual($yearsLeftToLive, 29);
	}
	
	/*
	 * Test years left to live based on age and gender (female)
	 * */
	function testGetAgeFemale() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertEqual($yearsLeftToLive, 33);
	}

	/*
	 * Test years left to live based on age and gender. The age is lower than required. 
	 * @return false
	 * */	
	function testGetAgeLowAgeFalse() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 9, 'female', 'cleaner');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertFalse($yearsLeftToLive);
	}

	/*
	 * Test years left to live based on age and gender. The age is higher than required. 
	 * @return false
	 * */
	function testGetAgeHighAgeFalse() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 121, 'female', 'cleaner');
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$this->assertFalse($yearsLeftToLive);
	}
	
	
	function testNumberOfUnachievedGoals() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner');
		$numberOfUnachievedGoals = $user->numberOfUnachievedGoals(10, 4);
		$this->assertEqual($numberOfUnachievedGoals, 6);
	}
	

	function testNumberOfUnachievedGoalsProcentage() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner');
		$number = $user->numberOfUnachievedGoalsProcentage(10, 4);
		$this->assertEqual($number, 40);
	}
	
	function testFearFactor() {
		$user = new User('Ulla', 'Hansen', 'uhansen', 'ulla@hansen.dk', 'Copenhagen', 'Denmark', 45, 'female', 'cleaner');
		
		$yearsLeftToLive = $user->calculateYeasLeftToLive($user->getAge(), $user->getGender());
		$numberOfUnachievedGoalsProcentage = $user->numberOfUnachievedGoalsProcentage(10, 4);
		
		// the $fearFactor varable needs to be parsed to a String (strval) in order to pass the test.
		$fearFactor = strval ($user->fearFactor($yearsLeftToLive, $numberOfUnachievedGoalsProcentage));
		
		$this->assertEqual($fearFactor, '1.862');
	}
	
	

}


?>