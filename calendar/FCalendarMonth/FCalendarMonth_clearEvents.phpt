--TEST--
Ensure FCalendarMonth::clearEvents() removes all events from all days.
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
	printf('%3d', $day->getDate()->format('d'));
}
echo PHP_EOL;
foreach ($month->getCalendarDays() as $day) {
	printf('%3d', count($day));
}
echo PHP_EOL;

$month->clearEvents();
foreach ($month->getCalendarDays() as $day) {
	printf('%3d', count($day));
}
echo PHP_EOL;
?>
--EXPECT--
 31  1  2  3  4  5  6  7  8  9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31  1  2  3
  0  0  0  0  0  3  1  1  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0
  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0  0
