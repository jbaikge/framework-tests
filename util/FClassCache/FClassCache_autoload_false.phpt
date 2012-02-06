--TEST--
Ensure FClassCache::autoload returns false if a class does not exist.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// No dummy class defined
var_dump(FClassCache::autoload('dummy'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
bool(false)
