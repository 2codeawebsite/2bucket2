<?php

class Test2Test extends PHPUnit_Framework_TestCase {
	
	
	public function testCheckNum2() {
        $check = new Test2();
        $this->assertFalse($check->checkNum(1, 2));
    }

}
?>