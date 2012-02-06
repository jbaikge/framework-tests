--TEST--
Ensure FJSON::decode() executes when the options parameter is passed in and PHP version is at least 5.4.0.
--SKIPIF--
<?php
if (version_compare(PHP_VERSION, '5.4.0') < 0) {
  echo 'Skipping: Current PHP Version should not support the options parameter and therefore will not properly pass this test.';
}
?>
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$json = '{"string_value":"string","integer_value":1,"array_value":["one","two"]}';
var_dump(FJSON::decode($json, true, 4, 'JSON_BIGINT_AS_STRING'));
?>
--EXPECT--
array(3) {
  ["string_value"]=>
  string(6) "string"
  ["integer_value"]=>
  int(1)
  ["array_value"]=>
  array(2) {
    [0]=>
    string(3) "one"
    [1]=>
    string(3) "two"
  }
}
