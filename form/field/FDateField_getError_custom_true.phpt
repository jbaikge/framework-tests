--TEST--
Ensure FDateField::getError() returns the custom error as specified after FDateField::validate() execution.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FDateField('test');
$field->load('');
$field->error_required('Missing value');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECT--
bool(false)
string(13) "Missing value"
string(13) "Missing value"
