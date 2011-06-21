--TEST--
Ensure FObject::__get() works
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}

$object = new MyObject();

$object->myVar = 4;

var_dump($object->getData());

var_dump($object->myVar);
?>
--EXPECT--
array(1) {
  ["myVar"]=>
  int(4)
}
int(4)
