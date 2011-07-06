--TEST--
Ensure FFormField::getError() returns false when no error exists.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->load('test');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECT--
bool(true)
string(4) "test"
bool(false)
