--TEST--
Ensure FCalendarMonth::getNumDays() returns 31 for January.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth('Jan', date('Y'));
var_dump($month->getNumDays());
?>
--EXPECT--
int(31)

