--TEST--
Ensure postFoo() runs when $object->foo() is called.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

interface MyHook {}

class MyHookDriver extends FObjectDriver implements FObjectHooks {
	public function preFoo () {}
	public function doFoo () {}
	public function postFoo () {
		echo 'post' . PHP_EOL;
	}
	public function failFoo ($exception) {}
}

class MyClass extends FObject implements MyHook {
	public static function getModel () {}
}

$object = new MyClass;
var_dump($object->foo());
?>
--EXPECT--
post
NULL
