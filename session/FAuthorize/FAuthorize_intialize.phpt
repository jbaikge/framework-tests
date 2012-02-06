--TEST--
Ensure FAuthorize generates properly.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$rule = FAuthorizeRule::newRule ('test');
$validate = FAuthorize::newInstance();
var_dump($validate);
?>
--EXPECT--
object(FAuthorize)#2 (1) {
  ["rules":"FAuthorize":private]=>
  array(0) {
  }
}
