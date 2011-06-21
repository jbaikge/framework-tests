--TEST--
Ensure FObjectDriver::$subject is an object reference.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

class MyDriver extends FObjectDriver {
	public function modify () {
		$this->subject->foo = "bar";
	}
}

class MyClass {
	public $foo = "foo";
}

$my_class = new MyClass();
$my_driver = new MyDriver($my_class);

var_dump($my_class);

$my_driver->modify();

var_dump($my_class);
?>
--EXPECT--
object(MyClass)#1 (1) {
  ["foo"]=>
  string(3) "foo"
}
object(MyClass)#1 (1) {
  ["foo"]=>
  string(3) "bar"
}
