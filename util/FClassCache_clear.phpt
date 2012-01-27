--TEST--
Ensure FClassCache::clear resets the class cache file.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
// Trigger the class_cache to load.
FClassCache::classExists('FClassCache');
$exists = file_exists($_ENV['config']['cache.class_list']);
FClassCache::clear();
$gone = file_exists($_ENV['config']['cache.class_list']);
var_dump($exists, $gone);
?>
--EXPECT--
bool(true)
bool(false)
