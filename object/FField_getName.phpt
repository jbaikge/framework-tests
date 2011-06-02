--TEST--
Ensure FField::getName() returns the proper value
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$field = FField::make('test');
var_dump($field->getName());
?>
--EXPECT--
string(4) "test"
