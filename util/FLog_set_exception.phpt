--TEST--
Ensure FLog::set() throws an exception when trying to set the messages key.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
if (!FClassCache::classExists('FLog')) {
  print "skip FLog class not available";
}
?>
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

try {
	FLog::set('messages', 'hi');
	var_dump(false);
} catch (InvalidArgumentException $iae) {
	var_dump(true);
}
?>
--EXPECT--
bool(true)
