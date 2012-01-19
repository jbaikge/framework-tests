--TEST--
Ensure FUploadField functions at the most basic level.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

// Fake an upload id from data source
$fake_load = 1;

$field = new FUploadField('test');
// Specify the name in $_FILES since we are not running through FForm::load();
$field->load($fake_load);
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getRawValue());
?>
--EXPECTF--
bool(true)
string(1) "1"
int(1)
