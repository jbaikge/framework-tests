--TEST--
Ensure FAuthorizeRule generates properly with multiple validations, exemptions and actions.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class TestFail implements FAuthorizeFailAction {
  public function fail () {
    echo 'Failed Authentication.' . PHP_EOL;
  }
}

class TestSuccess implements FAuthorizeSuccessAction {
  public function success () {
    echo 'Successful Authentication.' . PHP_EOL;
  }
}

$rule_1 = FAuthorizeRule::newRule ('test_1')
          ->addExemption(true)
          ->addExemption(false)
          ->addExemption(true)
          ->addValidation(true)
          ->addValidation(false)
          ->addValidation(true)
          ->addAction(new TestFail())
          ->addAction(new TestSuccess());
var_dump($rule_1);
?>
--EXPECT--
object(FAuthorizeRule)#1 (4) {
  ["restrict"]=>
  string(8) "`test_1`"
  ["exempt":"FAuthorizeRule":private]=>
  int(1)
  ["valid":"FAuthorizeRule":private]=>
  int(0)
  ["actions":"FAuthorizeRule":private]=>
  array(2) {
    [0]=>
    object(TestFail)#2 (0) {
    }
    [1]=>
    object(TestSuccess)#3 (0) {
    }
  }
}
