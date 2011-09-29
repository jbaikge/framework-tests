--TEST--
Ensure FNodeMessenger::sendFLog() sends the FLog.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

FLog::message(array(
	'test' => true,
	'number' => 69,
	'foo' => "bar"
));

FNodeMessenger::sendFLog();
?>
--EXPECT--
