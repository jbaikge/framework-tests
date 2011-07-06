--TEST--
Ensure FFormField::getId() automatically generates a field ID based on the field name.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
var_dump($field->getId());
?>
--EXPECT--
string(4) "test"
