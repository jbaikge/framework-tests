--TEST--
Ensure FFormField validates when a default value has been assigned and no value is passed in.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->default('tester');
list($valid, $value) = $field->loadAndValidate("");
var_dump($valid, $value);
?>
--EXPECT--
bool(true)
string(6) "tester"
