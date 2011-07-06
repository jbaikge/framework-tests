--TEST--
Ensure FFormField returns a blank string when one is passed in and optional is true.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->optional(true);
list($valid, $value) = $field->loadAndValidate("");
var_dump($valid, $value);
?>
--EXPECT--
bool(true)
string(0) ""
