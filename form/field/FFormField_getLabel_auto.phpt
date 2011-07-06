--TEST--
Ensure FFormField::getLabel() automatically generates a label from the field name.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test_field');
var_dump($field->getLabel());
?>
--EXPECT--
string(10) "Test Field"
