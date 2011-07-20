--TEST--
Ensure FFormField::getError() returns false regardless of custom error message being set.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->load('test');
$field->error_required('Missing value');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECT--
bool(true)
string(4) "test"
bool(false)
