<?php 


class TestTest1 extends PHPUnit_Framework_TestCase {
	
	
	public function testCheckNum1() {
        $check = new TestClass1();

        $this->assertFalse($check->checkNum(3, 2));
    }

}
?>