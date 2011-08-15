--TEST--
Ensure FAuthorizeFailAction throws an exception when the implementing class that does not contain the required fail() method.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

class TestAction implements FAuthorizeFailAction {
	// missing required function fail();
}
$test_action = new TestAction();
var_dump($test_action);
?>
--EXPECTF--
Fatal error: Class TestAction contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (FAuthorizeFailAction::fail)%s
