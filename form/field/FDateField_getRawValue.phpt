--TEST--
Ensure FDateField::getRawValue() returns the date string supplied prior to strtotime() conversion.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$string = 'January 1, 2012';
$field = new FDateField('test');
$field->load($string);
list($valid, $value) = $field->validate();
var_dump($string, $valid, $value, $field->getRawValue());
?>
--EXPECT--
string(15) "January 1, 2012"
bool(true)
int(1325394000)
string(15) "January 1, 2012"
