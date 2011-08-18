--TEST--
Ensure FCalendarEvent::getDuration() returns the set duration.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$duration = new DateInterval('P15M');

var_dump($duration == FCalendarEvent::newInstance()
	->setDuration('15 minutes')
	->getDuration()
);
?>
--EXPECT--
bool(true)
