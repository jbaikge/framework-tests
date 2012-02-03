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
foreach ($day as $key => $event) {
	var_dump(isset($day[$key]));
}
?>
--EXPECT--
bool(false)
bool(true)
bool(false)
bool(false)
bool(true)
