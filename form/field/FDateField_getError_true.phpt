--TEST--
Ensure FDateField::getError() returns the same error as FDateField::validate() after execution.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FDateField('test');
$field->load('');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECT--
bool(false)
string(29) "Invalid date or time entered."
string(29) "Invalid date or time entered."
