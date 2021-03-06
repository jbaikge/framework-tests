--TEST--
Ensure FAuthorizeRule generates properly with multiple validations and exemptions.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$rule_1 = FAuthorizeRule::newRule ('test_1')
          ->addExemption(true)
          ->addExemption(false)
          ->addExemption(true)
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
  int(1)
  ["valid":"FAuthorizeRule":private]=>
  int(0)
  ["actions":"FAuthorizeRule":private]=>
  array(0) {
  }
}
