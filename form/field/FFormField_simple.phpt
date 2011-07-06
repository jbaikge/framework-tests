--TEST--
Ensure FFormField returns the same valid value passed to it.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
list($valid, $value) = $field->loadAndValidate("test");
var_dump($valid, $value);
?>
--EXPECT--
bool(true)
string(4) "test"
