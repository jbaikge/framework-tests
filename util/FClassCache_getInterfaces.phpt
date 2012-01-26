--TEST--
Ensure FClassCache::getInterfaces returns an array of interfaces implemented by the supplied class.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
$dummy_load = new FCalendarDay(new DateTime());
FClassCache::classExists('FCalendarDay');
var_dump(FClassCache::getInterfaces('FCalendarDay'));
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
