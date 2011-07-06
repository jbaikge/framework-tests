--TEST--
Ensure FFormField defaults to required and returns an error on blank value.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
list($valid, $value) = $field->loadAndValidate("");
var_dump($valid, $value);
?>
--EXPECT--
bool(false)
string(14) "Value required"
