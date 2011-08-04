--TEST--
Ensure FCalendarMonth::getStartDate() returns the correct date.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth(date('M'), date('Y'));
var_dump($month->getStartDate()->format('Ymd') == date('Ym01'));
?>
--EXPECT--
bool(true)
