--TEST--
Ensure FAuthorize initializes properly when a rule is added.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$rule = FAuthorizeRule::newRule ('test');
$validate = FAuthorize::newInstance()->addRule($rule);
var_dump($validate);
?>
--EXPECT--
object(FAuthorize)#2 (1) {
  ["rules":"FAuthorize":private]=>
  array(1) {
    [0]=>
    object(FAuthorizeRule)#1 (4) {
      ["restrict"]=>
      string(6) "`test`"
      ["exempt":"FAuthorizeRule":private]=>
      bool(false)
      ["valid":"FAuthorizeRule":private]=>
      bool(true)
      ["actions":"FAuthorizeRule":private]=>
      array(0) {
      }
    }
  }
}
