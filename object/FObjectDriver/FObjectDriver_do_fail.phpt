--TEST--
Ensure failFoo() runs when $object->foo() is called and doFoo() fails.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

interface MyHook {}

class MyHookDriver extends FObjectDriver implements FObjectHooks {
	public function preFoo () {}
	public function doFoo () {
		echo 'do' . PHP_EOL;
		throw new Exception('do');
	}
	public function postFoo () {}
	public function failFoo ($exception) {
		echo 'Fail: ' . $exception->getMessage() . PHP_EOL;
	}
}

class MyClass extends FObject implements MyHook {
	public static function getModel () {}
}

$object = new MyClass;
var_dump($object->foo());
?>
--EXPECT--
do
Fail: do
NULL
