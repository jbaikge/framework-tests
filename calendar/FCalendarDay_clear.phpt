--TEST--
Ensure FCalendarDay::clear() resets the internal counters.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
$day->addEvent(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 1, 2011 11:00:00')
	->setDuration('2 hours')
);
var_dump(count($day), $day->getNumEvents());
$day->clear();
var_dump(count($day), $day->getNumEvents());
?>
--EXPECT--
int(1)
int(1)
int(0)
int(0)
