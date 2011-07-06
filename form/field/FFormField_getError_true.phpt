--TEST--
Ensure FFormField::getError() returns the same error as FFormField::validate() after execution.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->load('');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECT--
bool(false)
string(14) "Value required"
string(14) "Value required"