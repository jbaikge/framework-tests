--TEST--
Ensure FFormField::getId() retains the ID and returns it when set customly.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->id('my-id');
var_dump($field->getId());
?>
--EXPECT--
string(5) "my-id"
