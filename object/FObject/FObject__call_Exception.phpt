--TEST--
Ensure FObject::__call tosses an exception when a called method is invalid.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

class MyObject extends FObject {
	public static function getModel() {}
}
$obj = new MyObject();
var_dump($obj->bogus_method());
?>
--EXPECTF--
Fatal error: Call to undefined method MyObject::bogus_method()%s
