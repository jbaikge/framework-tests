--TEST--
Ensure FObject::__call executes a class method when method_exists is true.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}

	protected function custom_function($arg) {
		return $arg;
	}
}

$obj = new MyObject();
var_dump($obj->custom_function(true));
?>
--EXPECT--
bool(true)
