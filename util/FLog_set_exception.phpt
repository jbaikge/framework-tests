--TEST--
Ensure FLog::set() throws an exception when trying to set the messages key.
--SKIPIF--
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
