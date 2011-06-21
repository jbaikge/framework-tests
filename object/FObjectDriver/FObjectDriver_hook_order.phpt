--TEST--
Ensure preFoo(), doFoo(), and postFoo() run when $object->foo() is called.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

interface MyHook {}

class MyHookDriver extends FObjectDriver implements FObjectHooks {
	public function preFoo () {
		echo 'pre' . PHP_EOL;
	}
	public function doFoo () {
		echo 'do' . PHP_EOL;
	}
	public function postFoo () {
		echo 'post' . PHP_EOL;
	}
	public function failFoo ($exception) {
		echo 'fail' . PHP_EOL;
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
do
post
NULL
