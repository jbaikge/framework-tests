--TEST--
Ensure FCalendarDay::offsetUnset() removes the event from the specified index.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');
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
		var_dump($event->getStart()->format('c'));
	} else {
		var_dump(false);
	}
}

unset($day[1]);

var_dump($day->getNumEvents());
foreach ($day as $event) {
	if ($event) {
		var_dump($event->getStart()->format('c'));
	} else {
		var_dump(false);
	}
}
?>
--EXPECT--
int(2)
bool(false)
string(25) "2011-08-01T11:00:00-04:00"
bool(false)
bool(false)
string(25) "2011-08-01T15:00:00-04:00"
int(1)
bool(false)
bool(false)
bool(false)
bool(false)
string(25) "2011-08-01T15:00:00-04:00"