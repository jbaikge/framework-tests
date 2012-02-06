--TEST--
Ensure FClassCache::getParents returns an array of parent objects for the supplied class.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Trigger the class_cache to load.
FClassCache::classExists('FCalendar');
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
