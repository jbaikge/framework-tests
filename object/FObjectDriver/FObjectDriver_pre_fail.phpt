--TEST--
Ensure failFoo() runs when $object->foo() is called and preFoo() fails.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

interface MyHook {}

class MyHookDriver extends FObjectDriver implements FObjectHooks {
	public function preFoo () {
		echo 'pre' . PHP_EOL;
		throw new Exception('pre');
	}
	public function doFoo () {}
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
pre
Fail: pre
NULL
