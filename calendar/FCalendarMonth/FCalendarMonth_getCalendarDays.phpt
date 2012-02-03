--TEST--
Ensure FCalendarMonth::getCalendarDays() returns a collection of FCalendarDay objects.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$month = new FCalendarMonth(date('M'), date('Y'));
$valid = true;
foreach ($month->getCalendarDays() as $day) {
	$valid = $valid && $day instanceof FCalendarDay;
}
var_dump($valid);
?>
--EXPECT--
bool(true)
