--TEST--
Ensure FObject::__call tosses an exception when a called method is invalid.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}
$obj = new MyObject();
try {
	$obj->bogus_method();
	var_dump(false);
} catch (Exception $e) {
	var_dump(true);
}
?>
--EXPECT--
bool(true)
