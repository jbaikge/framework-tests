--TEST--
Ensure FFormField::getSubLabel() returns same value as set with.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$string = 'This is \'my\' <a href="http://www.google.com?i&s">string</a>';
$field = new FFormField('test');
$field->subLabel('This is my sub-label');
var_dump($field->getSubLabel());
?>
--EXPECT--
string(20) "This is my sub-label"
