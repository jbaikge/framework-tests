--TEST--
Ensure FAuthorize::validate returns true when using rule cascading that evaluates to true.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$rule_1 = FAuthorizeRule::newRule ('test')->addValidation(true);
$rule_2 = FAuthorizeRule::newRule ('test_sub')->addValidation(true);

$validated = FAuthorize::newInstance()
             ->addRule($rule_1)
             ->addRule($rule_2)
             ->validate('test_sub');
var_dump($validated);
?>
--EXPECT--
bool(true)
