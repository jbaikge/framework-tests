--TEST--
Ensure an attached driver private method does not exist on an FObject.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

interface MyMethod {}

class MyMethodDriver extends FObjectDriver {
	public function myMethod () {
		return true;
	}
}

class MyClass extends FObject implements MyMethod {
	public static function getModel () {}
}

$object = new MyClass;
var_dump($object->hasMethod('wrongMethod'));
?>
--EXPECT--
bool(false)
