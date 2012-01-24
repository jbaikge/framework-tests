--TEST--
Ensure FUploadField::getError() returns false when no error exists.
--DESCRIPTION--
You must have php5-cgi installed for this test to work. It will skip otherwise.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
if (php_sapi_name()=='cli') die ('Must be run in CGI mode');
?>
--POST_RAW--
Content-type: multipart/form-data, boundary=FormBoundary

--FormBoundary
Content-Disposition: form-data; name="test"; filename="upload_tester.txt"
Content-Type: text/plain

This is a test upload.
--FormBoundary--
--FILE--
<?php
define('DATABASE', 'single');
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
include ('upload.php');

$field = new FUploadField('test');
$field->load($_FILES['test']);
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECTF--
bool(true)
string(%d) "%s"
bool(false)
