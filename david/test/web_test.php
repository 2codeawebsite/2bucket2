<?php

require_once('simpletest/autorun.php');
require_once('simpletest/web_tester.php');

class TestOfLastcraft extends WebTestCase {
    
    function testHomepage1() {
        $this->assertTrue($this->get('http://2bucket.edit4web.com/'));
    }
}

?>