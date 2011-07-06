--TEST--
Ensure FFormField::getSubLabel() returns blank when not set.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$string = 'This is \'my\' <a href="http://www.google.com?i&s">string</a>';
$field = new FFormField('test');
var_dump($field->getSubLabel());
?>
--EXPECT--
NULL
