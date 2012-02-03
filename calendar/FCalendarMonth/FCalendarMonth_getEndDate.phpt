--TEST--
Ensure FCalendarMonth::getEndDate() returns the correct date.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$month = new FCalendarMonth(date('M'), date('Y'));
$end_date = date('Ymd', strtotime('+1 month -1 day', strtotime(date('Y-m-01'))));
var_dump($month->getEndDate()->format('Ymd') == $end_date);
?>
--EXPECT--
bool(true)
