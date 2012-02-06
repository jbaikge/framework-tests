--TEST--
Ensure FClassCache::getInterfaces triggers the loading / creation of the cache class file if it doesn't already exist.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Clear the class cache
FClassCache::clear();
// Trigger the class_cache to load.
var_dump(FClassCache::getInterfaces('FCalendarDay'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
array(4) {
  ["ArrayAccess"]=>
  string(11) "ArrayAccess"
  ["Countable"]=>
  string(9) "Countable"
  ["IteratorAggregate"]=>
  string(17) "IteratorAggregate"
  ["Traversable"]=>
  string(11) "Traversable"
}
--XFAIL--
FClassCache does not appear to properly load implemented interfaces into the the class cache until the specified class is instantiated.
