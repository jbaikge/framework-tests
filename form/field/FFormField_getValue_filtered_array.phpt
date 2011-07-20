--TEST--
Ensure FFormField::getValue() returns an array santized by FILTER_DEFAULT (FILTER_UNSAFE_RAW) with a FILTER_FORCE_ARRAY flag.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$array = array('test value 1', 'test value 2', 'test value 3');
$field = new FFormField('test');
$field->flags(FILTER_FORCE_ARRAY);
$field->load($array);
list($valid, $value) = $field->validate();
var_dump($array, $valid, $value, $field->getValue());
?>
--EXPECT--
array(3) {
  [0]=>
  string(12) "test value 1"
  [1]=>
  string(12) "test value 2"
  [2]=>
  string(12) "test value 3"
}
bool(true)
array(3) {
  [0]=>
  string(12) "test value 1"
  [1]=>
  string(12) "test value 2"
  [2]=>
  string(12) "test value 3"
}
array(3) {
  [0]=>
  string(12) "test value 1"
  [1]=>
  string(12) "test value 2"
  [2]=>
  string(12) "test value 3"
}
