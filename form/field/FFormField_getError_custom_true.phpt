--TEST--
Ensure FFormField::getError() returns the custom error as specified after FFormField::validate() execution.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->load('');
$field->error_required('Missing value');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECT--
bool(false)
string(13) "Missing value"
string(13) "Missing value"
