--TEST--
Ensure FClassCache::hasInterface returns true when a class implements an interface.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
$dummy_load = new FCalendarDay(new DateTime());
var_dump(FClassCache::hasInterface ('FCalendarEvent', 'Dummy'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
bool(false)
--XFAIL--
FClassCache::hasInterface anticipates an array but FClassCache::getInterfaces does not return values casted as an array if only one interface is identified for the class.
