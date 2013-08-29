<?php

require_once('simpletest/autorun.php');

require_once('test_user.php');
require_once('test_time.php');


class AllTests extends TestSuite {
	
    function __construct() {
        parent::__construct();
        $this->add(new TestOfUser());
		$this->add(new TestOfClock());
    }
}

?>