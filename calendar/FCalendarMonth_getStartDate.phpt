--TEST--
Ensure FCalendarMonth::getStartDate() returns the correct date.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth(date('M'), date('Y'));
var_dump($month->getStartDate()->format('Ymd') == date('Ym01'));
?>
--EXPECT--
bool(true)
