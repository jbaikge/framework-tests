--TEST--
Ensure FCalendarMonth::getCalendarWeeks() fetches an array of weeks with 7 FCalendarDay objects within each week.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth('Aug', 2011);
foreach ($month->getCalendarWeeks() as $week) {
	foreach ($week as $day) {
		printf('%3d', $day->getDate()->format('d'));
	}
	echo PHP_EOL;
}

?>
--EXPECT--
 31  1  2  3  4  5  6
  7  8  9 10 11 12 13
 14 15 16 17 18 19 20
 21 22 23 24 25 26 27
 28 29 30 31  1  2  3
