--TEST--
Attach driver methods to an FObject.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

interface MyMethod {}

class MyMethodDriver extends FObjectDriver {
	public function myMethod () {
		return true;
	}
}

class MyObject extends FObject implements MyMethod {
	public static function getModel () {}
}

$object = new MyObject;
var_dump($object->myMethod());
?>
--EXPECT--
bool(true)
