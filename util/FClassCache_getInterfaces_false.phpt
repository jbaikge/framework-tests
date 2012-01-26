--TEST--
Ensure FClassCache::getInterfaces returns false for classes that do not implement interfaces.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
FClassCache::classExists('FCalendarEvent');
var_dump(FClassCache::getInterfaces('FCalendarEvent'));
?>
--EXPECT--
bool(false)
