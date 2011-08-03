--TEST--
Ensure FCalendar::compare() works for the start dates.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$start_dates = array(
	'1983-04-29T03:19:52-04:00',
	'1983-04-29T03:19:51-04:00', // one second sooner than the above
	'2030-04-17T19:25:55-04:00',
	'1970-01-19T04:47:22-05:00',
	'2035-02-12T03:07:45-05:00',
	'2014-04-26T14:26:09-04:00',
	'1984-04-01T13:40:49-05:00',
	'2009-03-21T22:43:22-04:00',
	'2016-08-23T04:30:47-04:00',
	'2036-02-08T12:26:20-05:00',
	'2024-08-19T11:55:58-04:00'
);
// Add even more entropy:
shuffle($start_dates);

$calendar = new FCalendar();

foreach ($start_dates as $start) {
	$calendar->insert(FCalendarEvent::newInstance()
		->setCreated('now')
		->setStart($start)
		->setDuration('P15M')
	);
}

foreach ($calendar as $event) {
	printf("%s\n", $event->getStart()->format('c'));
}
?>
--EXPECT--
1970-01-19T09:47:22+00:00
1983-04-29T07:19:51+00:00
1983-04-29T07:19:52+00:00
1984-04-01T18:40:49+00:00
2009-03-22T02:43:22+00:00
2014-04-26T18:26:09+00:00
2016-08-23T08:30:47+00:00
2024-08-19T15:55:58+00:00
2030-04-17T23:25:55+00:00
2035-02-12T08:07:45+00:00
2036-02-08T17:26:20+00:00
