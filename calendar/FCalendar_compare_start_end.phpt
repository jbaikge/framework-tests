--TEST--
Ensure FCalendar::compare() works for the start and end dates.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$dates = array(
	array('2011-09-23 04:00:27', '2011-09-23 17:27:16'),
	array('2011-09-23 04:00:27', '2011-09-23 17:26:16'), // Same start date
	array('1986-06-23 15:58:02', '1986-06-24 03:24:06'),
	array('1976-04-17 10:47:55', '1976-04-17 11:50:33'),
	array('2025-12-01 20:34:34', '2025-12-01 20:57:35'),
	array('1977-11-04 05:24:14', '1977-11-04 18:10:33'),
	array('2025-11-07 15:28:06', '2025-11-08 04:43:09'),
	array('2026-12-03 05:01:33', '2026-12-03 13:28:21'),
	array('1972-03-02 19:29:31', '1972-03-03 07:39:22'),
	array('1972-03-02 19:29:31', '1972-03-03 07:39:22'), // Same start and end dates
	array('2002-08-08 07:04:31', '2002-08-08 19:37:54'),
	array('2027-01-26 20:57:20', '2027-01-27 03:55:19'),
);
// Add even more entropy:
shuffle($dates);

$calendar = new FCalendar();

foreach ($dates as $date) {
	list($start, $end) = $date;
	$calendar->insert(FCalendarEvent::newInstance()
		->setCreated('now')
		->setStart($start)
		->setEnd($end)
	);
}

foreach ($calendar as $event) {
	printf("%s %s\n",
		$event->getStart()->format('c'),
		$event->getEnd()->format('c')
	);
}
?>
--EXPECT--
1972-03-02T19:29:31-05:00 1972-03-03T07:39:22-05:00
1972-03-02T19:29:31-05:00 1972-03-03T07:39:22-05:00
1976-04-17T10:47:55-05:00 1976-04-17T11:50:33-05:00
1977-11-04T05:24:14-05:00 1977-11-04T18:10:33-05:00
1986-06-23T15:58:02-04:00 1986-06-24T03:24:06-04:00
2002-08-08T07:04:31-04:00 2002-08-08T19:37:54-04:00
2011-09-23T04:00:27-04:00 2011-09-23T17:26:16-04:00
2011-09-23T04:00:27-04:00 2011-09-23T17:27:16-04:00
2025-11-07T15:28:06-05:00 2025-11-08T04:43:09-05:00
2025-12-01T20:34:34-05:00 2025-12-01T20:57:35-05:00
2026-12-03T05:01:33-05:00 2026-12-03T13:28:21-05:00
2027-01-26T20:57:20-05:00 2027-01-27T03:55:19-05:00
