--TEST--
Ensure FObject::__construct() works
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}

$object = new MyObject(array('myVar' => 4));

var_dump($object->getData());
?>
--EXPECT--
array(1) {
  ["myVar"]=>
  int(4)
}
