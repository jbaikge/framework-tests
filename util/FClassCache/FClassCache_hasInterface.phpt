--TEST--
Ensure FClassCache::hasInterface returns true when a class implements an interface.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Trigger the class_cache to load.
$dummy_load = new FCalendarDay(new DateTime());
var_dump(FClassCache::hasInterface ('FCalendarDay', 'IteratorAggregate'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
bool(true)
