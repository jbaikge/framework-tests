--TEST--
Ensure FCalendarMonth::getCalendarEnd() doesn't put more than a week of days after the last day of a month.
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
	$last_day = $month->getEndDate()->format('d');
	$last_cal_day = $month->getCalendarEnd()->format('d');
	printf("%2d %2d %2d\n", $m, $last_day, $last_cal_day);
}
?>
--EXPECT--
 1 31  5
 2 28  5
 3 31  2
 4 30 30
 5 31  4
 6 30  2
 7 31  6
 8 31  3
 9 30  1
10 31  5
11 30  3
12 31 31
