--TEST--
Ensure FFormField::getTemplate() returns the same template when customly set.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FFormField('test');
$field->template('templates/MyCustomTemplate.html.php');
var_dump($field->getTemplate());
?>
--EXPECT--
string(35) "templates/MyCustomTemplate.html.php"