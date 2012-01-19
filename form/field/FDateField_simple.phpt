--TEST--
Ensure FDateField returns a strtotime() converted value of the string passed to it.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FDateField('test');
list($valid, $value) = $field->loadAndValidate("January 1, 2012");
var_dump($valid, $value);
?>
--EXPECT--
bool(true)
int(1325394000)
