--TEST--
Ensure FClassCache::getInterfaces returns inline implemented interfaces that were not registered in the class cache.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Clear the class cache
FClassCache::clear();
// Create a dummy interface
interface dummy_interface {}
// Create a class that implements the dummy interface
class dummy implements dummy_interface {
	private $placeholder;
}
var_dump(FClassCache::getInterfaces('dummy'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
array(1) {
  ["dummy_interface"]=>
  string(15) "dummy_interface"
}
