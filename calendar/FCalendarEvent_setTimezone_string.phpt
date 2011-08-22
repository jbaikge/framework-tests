--TEST--
Ensure FCalendarEvent::setTimezone() sets the appropriate timezone with a string argument.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$timezone = 'America/Adak';
var_dump($timezone == FCalendarEvent::newInstance()
	->setTimezone($timezone)
	->getTimezone()
		->getName()
);
?>
--EXPECT--
bool(true)
