--TEST--
Ensure FClassCache::hasInterface returns true when a class implements an interface.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
$dummy_load = new FCalendarDay(new DateTime());
var_dump(FClassCache::hasInterface ('FCalendarEvent', 'IteratorAggregate'));
?>
--EXPECT--
bool(false)
