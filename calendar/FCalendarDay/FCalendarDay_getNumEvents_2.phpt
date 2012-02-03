--TEST--
Ensure FCalendarDay::getNumEvents() returns the number of events, not slots.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
$day[1] = FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 1, 2011 11:00:00')
	->setDuration('2 hours')
;
$day[4] = FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 1, 2011 15:00:00')
	->setDuration('2 hours')
;
var_dump($day->getNumEvents());
foreach ($day as $event) {
	if ($event) {
		echo $event->getStart()->format('c');
	}
	echo PHP_EOL;
}
?>
--EXPECT--
int(2)

2011-08-01T11:00:00-04:00


2011-08-01T15:00:00-04:00
