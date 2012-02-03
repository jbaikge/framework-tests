--TEST--
Ensure FCalendarMonth::insert() applies events to calendar days.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$month = new FCalendarMonth('Aug', 2011);
$month->insert(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 5, 2011 11:00:00')
	->setEnd('Aug 5, 2011 13:00:00')
);
$month->insert(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 5, 2011')
	->setEnd('Aug 7, 2011 23:59:59')
);
$month->insert(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 5, 2011 12:00:00')
	->setEnd('Aug 5, 2011 13:00:00')
);

foreach ($month->getCalendarDays() as $day) {
	printf("%s %d\n", $day->getDate()->format('Y-m-d'), count($day));
	foreach ($day as $event) {
		printf("\t%s - %s\n", $event->getStart()->format('c'), $event->getEnd()->format('c'));
	}
}
?>
--EXPECT--
2011-07-31 0
2011-08-01 0
2011-08-02 0
2011-08-03 0
2011-08-04 0
2011-08-05 3
	2011-08-05T00:00:00-04:00 - 2011-08-07T23:59:59-04:00
	2011-08-05T11:00:00-04:00 - 2011-08-05T13:00:00-04:00
	2011-08-05T12:00:00-04:00 - 2011-08-05T13:00:00-04:00
2011-08-06 1
	2011-08-05T00:00:00-04:00 - 2011-08-07T23:59:59-04:00
2011-08-07 1
	2011-08-05T00:00:00-04:00 - 2011-08-07T23:59:59-04:00
2011-08-08 0
2011-08-09 0
2011-08-10 0
2011-08-11 0
2011-08-12 0
2011-08-13 0
2011-08-14 0
2011-08-15 0
2011-08-16 0
2011-08-17 0
2011-08-18 0
2011-08-19 0
2011-08-20 0
2011-08-21 0
2011-08-22 0
2011-08-23 0
2011-08-24 0
2011-08-25 0
2011-08-26 0
2011-08-27 0
2011-08-28 0
2011-08-29 0
2011-08-30 0
2011-08-31 0
2011-09-01 0
2011-09-02 0
2011-09-03 0
