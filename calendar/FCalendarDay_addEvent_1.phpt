--TEST--
Ensure FCalendarDay::addEvent() adds 1 event.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
$event = FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 1, 2011 11:00:00')
	->setDuration('2 hours');
$day->addEvent($event);
var_dump($day);
?>
--EXPECT--

