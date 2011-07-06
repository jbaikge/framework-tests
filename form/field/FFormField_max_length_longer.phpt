--TEST--
Ensure FFormField triggers the max_length error when passed a string longer than max_length.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->max_length(3);
list($valid, $value) = $field->loadAndValidate("test");
var_dump($valid, $value);
?>
--EXPECT--
bool(false)
string(35) "Value must be 3 characters or fewer"
