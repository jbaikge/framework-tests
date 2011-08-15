--TEST--
Ensure FCalendar::compare() works for the end dates.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$dates = array(
	'1983-04-29 03:19:52',
	'1983-04-29 03:19:51', // one second sooner than the above
	'2030-04-17 19:25:55',
	'1970-01-19 04:47:22',
	'2035-02-12 03:07:45',
	'2014-04-26 14:26:09',
	'1984-04-01 13:40:49',
	'2009-03-21 22:43:22',
	'2009-03-21 22:43:22', // same as the one above
	'2016-08-23 04:30:47',
	'2036-02-08 12:26:20',
	'2024-08-19 11:55:58'
);
// Add even more entropy:
shuffle($dates);

$calendar = new FCalendar();

foreach ($dates as $date) {
	$calendar->insert(FCalendarEvent::newInstance()
		->setCreated('now')
		->setStart(0) // Jan 1, 1970
		->setEnd($date)
	);
}

foreach ($calendar as $event) {
	printf("%s\n", $event->getEnd()->format('c'));
}
?>
--EXPECT--
1970-01-19T04:47:22-05:00
1983-04-29T03:19:51-04:00
1983-04-29T03:19:52-04:00
1984-04-01T13:40:49-05:00
2009-03-21T22:43:22-04:00
2009-03-21T22:43:22-04:00
2014-04-26T14:26:09-04:00
2016-08-23T04:30:47-04:00
2024-08-19T11:55:58-04:00
2030-04-17T19:25:55-04:00
2035-02-12T03:07:45-05:00
2036-02-08T12:26:20-05:00