--TEST--
Ensure FClassCache::lastModified returns a timestamp reflecting the last modified date of the supplied class's file.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Trigger the class_cache to load.
$dummy_load = new FCalendarDay(new DateTime());
var_dump(FClassCache::lastModified ('FCalendarDay'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECTF--
int(%d)
