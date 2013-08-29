<?php

class TestClass1 {


	public function checkNum($num1, $num2) {
		$test = "false";
		
		if($num1 > $num2) {
			$test = "true";
		}
		
		return $test;
	}
	
}

?>