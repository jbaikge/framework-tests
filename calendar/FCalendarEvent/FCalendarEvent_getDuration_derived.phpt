--TEST--
Ensure FCalendarEvent::getDuration() returns the derived duration.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$duration = new DateInterval('P15M');

var_dump($duration == FCalendarEvent::newInstance()
	->setStart('Aug 1, 2011 15:00')
	->setEnd('Aug 1, 2011 15:15')
	->getDuration()
);
?>
--EXPECT--
bool(true)
