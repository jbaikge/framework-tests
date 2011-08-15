--TEST--
Ensure FAuthorizeRule generates properly with an FAuthorizeSuccessAction assigned.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

class TestAction implements FAuthorizeSuccessAction {
  public function success() {}
}
$rule_1 = FAuthorizeRule::newRule ('test_1')->addAction(new TestAction());
var_dump($rule_1);
?>
--EXPECT--
object(FAuthorizeRule)#1 (4) {
  ["restrict"]=>
  string(8) "`test_1`"
  ["exempt":"FAuthorizeRule":private]=>
  bool(false)
  ["valid":"FAuthorizeRule":private]=>
  bool(true)
  ["actions":"FAuthorizeRule":private]=>
  array(1) {
    [0]=>
    object(TestAction)#2 (0) {
    }
  }
}
