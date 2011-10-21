--TEST--
Ensure FClassCache::classExists() returns true if the class is already loaded.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
var_dump(FClassCache::classExists('FClassCache'));
?>
--EXPECT--
bool(true)
