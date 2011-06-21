--TEST--
Ensure doFoo() runs when $object->foo() is called.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

interface MyHook {}

class MyHookDriver extends FObjectDriver implements FObjectHooks {
	public function preFoo () {}
	public function doFoo () {
		echo 'do' . PHP_EOL;
	}
	public function postFoo () {}
	public function failFoo ($exception) {}
}

class MyClass extends FObject implements MyHook {
	public static function getModel () {}
}

$object = new MyClass;
var_dump($object->foo());
?>
--EXPECT--
do
NULL
