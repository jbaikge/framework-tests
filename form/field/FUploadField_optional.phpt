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

$field = new FUploadField('test');
$field->optional(true);
list($valid, $value) = $field->loadAndValidate("");
var_dump($valid, $value);
?>
--EXPECTF--
bool(true)
string(0) ""
