--TEST--
Ensure FUploadField::getError() returns false when no error exists.
--DESCRIPTION--
You must have php5-cgi installed for this test to work. It will skip otherwise.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
if (php_sapi_name()=='cli') die('skip');
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
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FUploadField('test');
// Specify the name in $_FILES since we are not running through FForm::load();
$field->load($_FILES['test']);
list($valid, $value) = $field->validate();
var_dump($valid, $value, $field->getError());
?>
--EXPECTF--
bool(true)
array(5) {
  ["name"]=>
  string(17) "upload_tester.txt"
  ["type"]=>
  string(10) "text/plain"
  ["tmp_name"]=>
  string(%d) "/tmp/%s"
  ["error"]=>
  string(1) "0"
  ["size"]=>
  string(2) "22"
}
bool(false)
