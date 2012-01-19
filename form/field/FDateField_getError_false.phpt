--TEST--
Ensure FDateField::getError() returns false when no error exists.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FDateField('test');
$field->load('January 1, 2012');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECT--
bool(true)
int(1325394000)
bool(false)
