--TEST--
Ensure blank items are placed in days when multi-day events span through them.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$month = new FCalendarMonth('Aug', 2011);

$base_event = FCalendarEvent::newInstance()
	->setCreated('now');

foreach (array(3, 4, 6, 7, 8, 9, 12, 15, 17, 20) as $day ) {
	$event = clone($base_event);
	$event->setStart('Aug ' . $day . ', 2011')
		->setDuration('5 days');
	$month->insert($event);
}

foreach ($month->getCalendarDays() as $day) {
	echo $day->getDate()->format('Y-m-d');
	for ($i = 0; $i < count($day); $i++) {
		$event = @$day[$i];
		if ($event instanceof FCalendarEvent) {
			printf(' %2d', $event->getStart()->format('d'));
		} else {
			echo '   ';
		}
	}
	echo PHP_EOL;
}
?>
--EXPECT--
2011-07-31
2011-08-01
2011-08-02
2011-08-03  3
2011-08-04  3  4
2011-08-05  3  4
2011-08-06  3  4  6
2011-08-07  3  4  6  7
2011-08-08  3  4  6  7  8
2011-08-09  9  4  6  7  8
2011-08-10  9     6  7  8
2011-08-11  9     6  7  8
2011-08-12  9 12     7  8
2011-08-13  9 12        8
2011-08-14  9 12
2011-08-15 15 12
2011-08-16 15 12
2011-08-17 15 12 17
2011-08-18 15    17
2011-08-19 15    17
2011-08-20 15 20 17
2011-08-21    20 17
2011-08-22    20 17
2011-08-23    20
2011-08-24    20
2011-08-25    20
2011-08-26
2011-08-27
2011-08-28
2011-08-29
2011-08-30
2011-08-31
2011-09-01
2011-09-02
2011-09-03
