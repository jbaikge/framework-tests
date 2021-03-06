--TEST--
Ensure FAuthorizeSuccessAction instantiates properly.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class TestAction implements FAuthorizeSuccessAction {
	public function success () {
		echo 'Success.';
	}
}
$test_action = new TestAction();
var_dump($test_action);
?>
--EXPECT--
object(TestAction)#1 (0) {
}
