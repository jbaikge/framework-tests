--TEST--
Ensure FClassCache::getInterfaces returns an empty array (false) for classes that do not implement interfaces.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Trigger the class_cache to load.
FClassCache::classExists('FCalendarEvent');
var_dump(FClassCache::getInterfaces('FCalendarEvent'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
array(0) {
}
