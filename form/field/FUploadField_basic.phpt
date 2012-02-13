--TEST--
Ensure FUploadField functions at the most basic level.
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
FObjectQuery::updateStructure();
include ('upload.php');

$field = new FUploadField('test');
// Specify the name in $_FILES since we are not running through FForm::load();
$field->load($_FILES['test']);
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getRawValue());
?>
--EXPECTF--
bool(true)
string(%d) "%s"
int(%d)
