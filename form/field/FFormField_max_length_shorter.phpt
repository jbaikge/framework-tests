--TEST--
Ensure FFormField does not trigger the max_length error when passed a string shorter than max_length.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->max_length(5);
list($valid, $value) = $field->loadAndValidate("test");
var_dump($valid, $value);
?>
--EXPECT--
bool(true)
string(4) "test"
