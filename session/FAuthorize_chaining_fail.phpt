--TEST--
Ensure FAuthorize fails properly when chaining FAuthorize objects that evaluate to false.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

class TestAction implements FAuthorizeFailAction, FAuthorizeSuccessAction {
  public function fail () {
    echo 'Failed Authentication.' . PHP_EOL;
  }
  public function success () {
    echo 'Successful Authentication.' . PHP_EOL;
  }
}

$auth_1 = FAuthorize::newInstance()
          ->addRule(FAuthorizeRule::newRule('test_1')
                    ->addValidation(false))
          ->validate('test_1');
$auth_2 = FAuthorize::newInstance()
          ->addRule(FAuthorizeRule::newRule('test_2')
                    ->addValidation(false))
          ->validate('test_2');
$final = FAuthorize::newInstance()
          ->addRule(FAuthorizeRule::newRule('final_auth')
                    ->addValidation($auth_1)
                    ->addValidation($auth_2)
                    ->addAction(new TestAction()))
          ->validate('final_auth');
var_dump($final);
?>
--EXPECT--
Failed Authentication.
bool(false)
