--TEST--
Ensure FClassCache::lastModified returns a timestamp reflecting the last modified date of the supplied class's file.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
$dummy_load = new FCalendarDay(new DateTime());
var_dump(FClassCache::lastModified ('FCalendarDay'));
?>
--EXPECTF--
int(%d)
