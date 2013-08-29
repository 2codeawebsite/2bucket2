<?php 


class TestTest1 extends PHPUnit_Framework_TestCase {
	
	
	public function testCheckNum() {
        $check = new TestClass1();

        $this->assertEquals(false, $check->checkNum(1, 2));
    }

}
?>