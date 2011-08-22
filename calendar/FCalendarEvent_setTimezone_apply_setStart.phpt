--TEST--
Ensure FCalendarEvent::setTimezone() sets the appropriate timezone to subsequent date set calls.
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
	->setStart('Aug 1, 2011 14:15')
	->getStart()
	->getTimezone()
	->getName()
);
?>
--EXPECT--
bool(true)
