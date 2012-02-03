--TEST--
Ensure FCalendarMonth::setWeekStart() doesn't put more than a week of days after the last day of a month.
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
		printf("%3d", $month->getCalendarEnd()->format('d'));
	}
	echo PHP_EOL;
}
?>
--EXPECT--
 |  1  2  3  4  5  6  7  8  9 10 11 12
-+------------------------------------
0|  5  5  2 30  4  2  6  3  1  5  3 31
1|  6  6  3  1  5  3 31  4  2  6  4  1
2| 31 28  4  2  6  4  1  5  3 31  5  2
3|  1  1  5  3 31  5  2  6  4  1  6  3
4|  2  2  6  4  1  6  3 31  5  2 30  4
5|  3  3 31  5  2 30  4  1  6  3  1  5
6|  4  4  1  6  3  1  5  2 30  4  2  6
