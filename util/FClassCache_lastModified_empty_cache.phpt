--TEST--
Ensure FClassCache::lastModified triggers the creation of the class cache if the file doesn't already exist.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Clear the cache
FClassCache::clear();
// Trigger the class_cache to load.
var_dump(FClassCache::lastModified ('FCalendarDay'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECTF--
int(%d)
