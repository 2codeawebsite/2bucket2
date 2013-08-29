<?php

require_once('simpletest/autorun.php');
require_once('time.php');


class TestOfClock extends UnitTestCase {

    function testClockTellsTime() {
        $clock = new Clock();
        $this->assertEqual($clock->now(), time());
    }
    
    function testClockAdvance() {
        $clock = new Clock();
        $clock->advance(10);
        $this->assertEqual($clock->now(), time() + 10);
    }
}


?>