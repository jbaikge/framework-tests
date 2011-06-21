--TEST--
Ensure FObject::__set() works
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}

$object = new MyObject();

var_dump($object->getData());

$object->myVar = 4;

var_dump($object->getData());
?>
--EXPECT--
array(0) {
}
array(1) {
  ["myVar"]=>
  int(4)
}
