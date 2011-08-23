--TEST--
Ensure FCalendarMonth::insert() taints the entire object and causes all of the events to clear when called after grabbing events.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth('Aug', 2011);
$month->insert(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 5, 2011 11:00:00')
	->setEnd('Aug 5, 2011 13:00:00')
);
$month->insert(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 5, 2011 12:00:00')
	->setEnd('Aug 5, 2011 13:00:00')
);
foreach ($month->getCalendarDays() as $day) {
	foreach ($day as $event) {
		printf("%s - %s\n", $event->getStart()->format('c'), $event->getEnd()->format('c'));
	}
}
echo '--TAINT--' . PHP_EOL;
$month->insert(FCalendarEvent::newInstance()
	->setCreated('now')
	->setStart('Aug 5, 2011')
	->setEnd('Aug 7, 2011 23:59:59')
);
foreach ($month->getCalendarDays() as $day) {
	foreach ($day as $event) {
		printf("%s - %s\n", $event->getStart()->format('c'), $event->getEnd()->format('c'));
	}
}

?>
--EXPECT--
2011-08-05T11:00:00-04:00 - 2011-08-05T13:00:00-04:00
2011-08-05T12:00:00-04:00 - 2011-08-05T13:00:00-04:00
--TAINT--
2011-08-05T00:00:00-04:00 - 2011-08-07T23:59:59-04:00
2011-08-05T00:00:00-04:00 - 2011-08-07T23:59:59-04:00
2011-08-05T00:00:00-04:00 - 2011-08-07T23:59:59-04:00
