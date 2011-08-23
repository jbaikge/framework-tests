--TEST--
Ensure FCalendarMonth::getCalendarStart() doesn't put more than a week of days before the first day of a month.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$format = 'm Y';
foreach (range(1, 12) as $m) {
	$month = new FCalendarMonth($m, 2011, $format);
	$first_day = $month->getStartDate()->format('d');
	$first_cal_day = $month->getCalendarStart()->format('d');
	printf("%2d %2d %2d\n", $m, $first_day, $first_cal_day);
}
?>
--EXPECT--
 1  1 26
 2  1 30
 3  1 27
 4  1 27
 5  1  1
 6  1 29
 7  1 26
 8  1 31
 9  1 28
10  1 25
11  1 30
12  1 27
