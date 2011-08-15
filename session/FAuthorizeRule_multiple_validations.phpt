--TEST--
Ensure FAuthorizeRule generates properly with multiple validations.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$rule_1 = FAuthorizeRule::newRule ('test_1')
          ->addValidation(true)
          ->addValidation(false)
          ->addValidation(true);
var_dump($rule_1);
?>
--EXPECT--
object(FAuthorizeRule)#1 (4) {
  ["restrict"]=>
  string(8) "`test_1`"
  ["exempt":"FAuthorizeRule":private]=>
  bool(false)
  ["valid":"FAuthorizeRule":private]=>
  int(0)
  ["actions":"FAuthorizeRule":private]=>
  array(0) {
  }
}
