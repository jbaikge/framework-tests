--TEST--
Ensure FAuthorizeRule generates properly with multiple rules.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$rule_1 = FAuthorizeRule::newRule ('test_1');
$rule_2 = FAuthorizeRule::newRule ('test_2');
var_dump($rule_1, $rule_2);
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
  array(0) {
  }
}
object(FAuthorizeRule)#2 (4) {
  ["restrict"]=>
  string(8) "`test_2`"
  ["exempt":"FAuthorizeRule":private]=>
  bool(false)
  ["valid":"FAuthorizeRule":private]=>
  bool(true)
  ["actions":"FAuthorizeRule":private]=>
  array(0) {
  }
}
