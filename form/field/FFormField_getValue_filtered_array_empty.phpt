--TEST--
Ensure FFormField::getValue() returns an empty array when an array with a blank value is passed in with a FILTER_FORCE_ARRAY set.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$array = array('', '', '');
$field = new FFormField('test');
$field->flags(FILTER_FORCE_ARRAY);
$field->load($array);
list($valid, $value) = $field->validate();
var_dump($array, $valid, $value, $field->getValue());
?>
--EXPECT--
array(3) {
  [0]=>
  string(0) ""
  [1]=>
  string(0) ""
  [2]=>
  string(0) ""
}
bool(true)
array(0) {
}
array(0) {
}
