--TEST--
Ensure FCalendarDay::addEvent() adds 1 event.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
$day->addEvent(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 1, 2011 11:00:00')
	->setDuration('2 hours')
);
var_dump(count($day));
foreach ($day as $event) {
	echo $event->getStart()->format('c') . PHP_EOL;
}
?>
--EXPECT--
int(1)
2011-08-01T11:00:00-04:00
