--TEST--
Ensure FJSON decodes to an object.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$json = '{"string_value":"string","integer_value":1,"array_value":["one","two"]}';
var_dump(FJSON::decode($json));
?>
--EXPECT--
object(stdClass)#1 (3) {
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
