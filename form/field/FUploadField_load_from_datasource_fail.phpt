--TEST--
Ensure FUploadField functions at the most basic level.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
if (php_sapi_name()=='cli') die ('Must be run in CGI mode');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
include ('upload.php');

// Fake an upload id from data source
$fake_load = null;

$field = new FUploadField('test');
// Specify the name in $_FILES since we are not running through FForm::load();
$field->load($fake_load);
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getRawValue());
?>
--EXPECTF--
bool(false)
string(12) "Missing File"
NULL
