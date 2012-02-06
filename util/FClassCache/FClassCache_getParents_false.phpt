--TEST--
Ensure FClassCache::getParents returns an empty array when the supplied class has no parent classes.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Trigger the class_cache to load.
FClassCache::classExists('FCalendarEvent');
var_dump(FClassCache::getParents('FCalendarEvent'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
array(0) {
}
