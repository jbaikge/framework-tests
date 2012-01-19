--TEST--
Ensure FDateField returns a false value when a blank value is passed in and optional is true.
--SKIPIF--
<?php require(dirname(__FILE__) . '/skipif.php'); ?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FDateField('test');
$field->optional(true);
list($valid, $value) = $field->loadAndValidate("");
var_dump($valid, $value);
?>
--EXPECT--
bool(true)
bool(false)
