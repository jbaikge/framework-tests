--TEST--
Ensure FJSON encodes objects.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$object->string_value = 'string';
$object->integer_value = 1;
$object->array_value = array('one', 'two');
echo FJSON::encode($object) . PHP_EOL;
?>
--EXPECT--
{"string_value":"string","integer_value":1,"array_value":["one","two"]}
