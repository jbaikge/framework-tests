--TEST--
Ensure FUploadField::getError() returns the same error as FUploadField::validate() after execution.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FUploadField('test');
// Specify the name in $_FILES since we are not running through FForm::load();
$field->load('');
$field->error_required('No File Uploaded.');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECTF--
bool(false)
string(17) "No File Uploaded."
string(17) "No File Uploaded."
