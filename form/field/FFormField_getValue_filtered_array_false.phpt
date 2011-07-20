--TEST--
Ensure FFormField::getValue() returns false and an error when an array is passed in without a FILTER_FORCE_ARRAY flag being set.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$array = array('test value 1', 'test value 2', 'test value 3');
$field = new FFormField('test');
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
bool(false)
string(14) "Value required"
bool(false)
