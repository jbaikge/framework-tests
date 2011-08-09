--TEST--
Ensure FJSON encodes arrays.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$array = array('string_value' => 'string', 'integer_value' => 1, 'array_value' => array('one', 'two'));
echo FJSON::encode($array) . PHP_EOL;
?>
--EXPECT--
{"string_value":"string","integer_value":1,"array_value":["one","two"]}
