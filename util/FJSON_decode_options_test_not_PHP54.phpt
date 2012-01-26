--TEST--
Ensure FJSON::decode() tosses a warning when the options parameter is passed in and PHP version is less than 5.4.0.
--SKIPIF--
<?php
if (version_compare(PHP_VERSION, '5.4.0') >=0 ) {
  echo 'Skipping: Current PHP Version should support the options parameter and therefore will not fail properly on this test.';
}
?>
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$json = '{"string_value":"string","integer_value":1,"array_value":["one","two"]}';
var_dump(FJSON::decode($json, true, 4, 'JSON_BIGINT_AS_STRING'));
?>
--EXPECTF--
Warning: json_decode does not support the options parameter until version 5.4.0.%s

