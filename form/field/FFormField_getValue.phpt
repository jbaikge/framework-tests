--TEST--
Ensure FFormField::getValue() returns a string santized by FILTER_DEFAULT (FILTER_UNSAFE_RAW).
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$string = 'This is \'my\' <a href="http://www.google.com?i&s">string</a>';
$field = new FFormField('test');
$field->load($string);
list($valid, $value) = $field->validate();
var_dump($string, $valid, $value, $field->getValue());
?>
--EXPECT--
string(59) "This is 'my' <a href="http://www.google.com?i&s">string</a>"
bool(true)
string(59) "This is 'my' <a href="http://www.google.com?i&s">string</a>"
string(59) "This is 'my' <a href="http://www.google.com?i&s">string</a>"
