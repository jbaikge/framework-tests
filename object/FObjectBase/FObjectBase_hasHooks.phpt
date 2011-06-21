--TEST--
Ensure an attached driver method exists on an FObject.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

interface MyHook {}

class MyHookDriver extends FObjectDriver implements FObjectHooks {
	public function preFoo () {}
	public function doFoo () {}
	public function postFoo () {}
	public function failFoo () {}
}

class MyClass extends FObject implements MyHook {
	public static function getModel () {}
}

$object = new MyClass;
var_dump($object->hasHooks('Foo'));
?>
--EXPECT--
bool(true)
