--TEST--
Ensure FAuthorizeRule throws an exception when an invalid action is passed.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class TestAction {
	//does not implement FAuthorizeAction, FAuthorizeFailAction or FAuthorizeSuccessAction.
}
$rule_1 = FAuthorizeRule::newRule ('test_1')->addAction(new TestAction());
?>
--EXPECTF--
Catchable fatal error: Argument 1 passed to FAuthorizeRule::addAction() must be an instance of FAuthorizeAction, instance of TestAction given%s