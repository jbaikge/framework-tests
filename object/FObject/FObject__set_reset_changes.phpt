--TEST--
Ensure FObject::__set() unsets its changes[$key] value when the value of data[$key] is the same.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}

$object = new MyObject(array('myVar'=>4));

var_dump($object->getChanges());

$object->myVar = 4;

var_dump($object->getChanges());
?>
--EXPECT--
array(0) {
}
array(0) {
}
