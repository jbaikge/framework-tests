--TEST--
Ensure FClassCache::getParents returns an empty array when the supplied class has no parent classes.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
FClassCache::classExists('FCalendarEvent');
var_dump(FClassCache::getParents('FCalendarEvent'));
?>
--EXPECT--
array(0) {
}
