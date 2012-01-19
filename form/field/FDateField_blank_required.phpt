--TEST--
Ensure FDateField defaults to required and returns an error on blank value.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FDateField('test');
list($valid, $value) = $field->loadAndValidate("");
var_dump($valid, $value);
?>
--EXPECT--
bool(false)
string(29) "Invalid date or time entered."
