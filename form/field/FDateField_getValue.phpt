--TEST--
Ensure FDateField::getValue() returns the integer value returned by strtotime().
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$string = 'January 1, 2012';
$field = new FDateField('test');
$field->load($string);
list($valid, $value) = $field->validate();
var_dump($string, $valid, $value, $field->getValue());
?>
--EXPECT--
string(15) "January 1, 2012"
bool(true)
int(1325394000)
int(1325394000)
