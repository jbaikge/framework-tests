--TEST--
Ensure FAuthorize::validate executes FAuthorizeFailAction on failed authorization.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

class TestAction implements FAuthorizeSuccessAction, FAuthorizeFailAction {
	public function success () {
		echo 'Successful Authentication.' . PHP_EOL;
	}
	public function fail () {
		echo 'Failed Authentication.' . PHP_EOL;
	}
}

$rule = FAuthorizeRule::newRule('test')->addValidation(false)->addAction(new TestAction());
$validate = FAuthorize::newInstance()->addRule($rule)->validate('test');
?>
--EXPECT--
Failed Authentication.
