--TEST--
Ensure FCalendarEvent::getTimezone() gets the appropriate timezone with a string argument.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$timezone = ini_get('date.timezone');
var_dump($timezone == FCalendarEvent::newInstance()
	->getTimezone()
		->getName()
);
?>
--EXPECT--
bool(true)
