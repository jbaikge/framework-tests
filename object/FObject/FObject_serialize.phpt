--TEST--
Ensure FObject::serialize() returns JSON-encoded data
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}

$object = new MyObject(array(
	'int' => 4,
	'string' => "hi",
	'array' => array(1,2)
));

var_dump(serialize($object));
?>
--EXPECT--
string(57) "C:8:"MyObject":37:{{"int":4,"string":"hi","array":[1,2]}}"
