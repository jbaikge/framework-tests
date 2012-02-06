--TEST--
Ensure FNodeMessenger::sendFLog() sends the FLog.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
if (!FClassCache::classExists('FLog')) {
	print "skip FLog class not available";
}
?>
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

FLog::message(array(
	'test' => true,
	'number' => 69,
	'foo' => "bar"
));

FLog::set('my_penis', 'is huge');

FNodeMessenger::sendFLog();
?>
--EXPECT--
