--TEST--
Ensure FFormField::getTemplate()s returns a template based on the field type.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
var_dump($field->getTemplate());
?>
--EXPECTF--
string(%d) "%s/form/field/templates/FFormField.html.php"