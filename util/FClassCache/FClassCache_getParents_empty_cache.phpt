--TEST--
Ensure FClassCache::getParents triggers the creation of the class cache if the file doesn't already exist.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Clear the cache
FClassCache::clear();
// Trigger the class_cache to load.
var_dump(FClassCache::getParents('FCalendar'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
array(2) {
  ["SplMinHeap"]=>
  string(10) "SplMinHeap"
  ["SplHeap"]=>
  string(7) "SplHeap"
}
