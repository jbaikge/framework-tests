--TEST--
Ensure FCalendarMonth::setWeekStart() doesn't put more than a week of days before the first day of a month.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$format = 'm Y';
echo ' |';
foreach (range(1, 12) as $m) {
	printf('%3d', $m);
}
echo PHP_EOL;
echo '-+' . str_repeat('-', 12 * 3) . PHP_EOL;
foreach (range(0, 6) as $w) {
	printf('%1d|', $w);
	foreach (range(1, 12) as $m) {
		$month = new FCalendarMonth($m, 2011, $format);
		$month->setWeekStart($w);
		printf("%3d", $month->getCalendarStart()->format('d'));
	}
	echo PHP_EOL;
}
?>
--EXPECT--
 |  1  2  3  4  5  6  7  8  9 10 11 12
-+------------------------------------
0| 26 30 27 27  1 29 26 31 28 25 30 27
1| 27 31 28 28 25 30 27  1 29 26 31 28
2| 28  1  1 29 26 31 28 26 30 27  1 29
3| 29 26 23 30 27  1 29 27 31 28 26 30
4| 30 27 24 31 28 26 30 28  1 29 27  1
5| 31 28 25  1 29 27  1 29 26 30 28 25
6|  1 29 26 26 30 28 25 30 27  1 29 26
