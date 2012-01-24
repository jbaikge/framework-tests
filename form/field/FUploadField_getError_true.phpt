--TEST--
Ensure FUploadField::getError() returns the same error as FUploadField::validate() after execution.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
if (php_sapi_name()=='cli') die ('Must be run in CGI mode');
?>
--FILE--
<?php
define('DATABASE', 'single');
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
include ('upload.php');

$field = new FUploadField('test');
$field->load('');
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECTF--
bool(false)
string(12) "Missing File"
string(12) "Missing File"
