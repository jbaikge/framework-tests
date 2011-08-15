--TEST--
Ensure FAuthorize::validate returns true when using a rule with an exemption set to true.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$rule = FAuthorizeRule::newRule ('test')->addExemption(true);
$validate = FAuthorize::newInstance()->addRule($rule)->validate('test');
var_dump($validate);
?>
--EXPECT--
bool(true)
